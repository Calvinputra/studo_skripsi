<?php

namespace App\Http\Controllers\studo;

use App\Http\Controllers\Controller;
use App\Models\Subscription;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Hash;
use PDF;

class SettingController extends Controller
{
    public function index()
    {
        if (!auth()->check()) {
            return redirect()->route('studo.index')->with('error', 'Harus Login terlebih dahulu');
        }

        $user = User::find(auth()->user()->id);

        $subscriptions = Subscription::join('classes', 'classes.id', '=', 'subscription.class_id')
        ->join('users', 'users.id', '=', 'classes.user_id')
        ->leftJoin('chapters', function ($join) {
            $join->on('chapters.class_id', '=', 'classes.id')
            ->whereRaw('chapters.id = (SELECT MIN(id) FROM chapters WHERE class_id = classes.id)');
        })
            ->select([
                'classes.*',
                'users.id as user_id',
                'users.name as tutor_name',
                'users.email as tutor_email',
                'chapters.id as chapter_id',
                'chapters.name as chapter_name',
            ])
            ->whereIn('subscription.id', function ($query) use ($user) {
                $query->select(DB::raw('MAX(id)'))
                ->from('subscription')
                ->where('user_id', $user->id)
                    ->where('status', 'paid')
                    ->groupBy('class_id');
            })
            ->get();

        $check_done_class = Subscription::join('classes', 'classes.id', '=', 'subscription.class_id')
        ->join('quest', 'quest.class_id', '=', 'classes.id')
        ->join('users', 'users.id', '=', 'classes.user_id')
        ->join('quest_completion', 'quest_completion.quest_id', '=', 'quest.id')
        ->join('project_log', 'project_log.class_id', '=', 'classes.id')
        ->select([
            'classes.*',
            'subscription.user_id as user_id',
            'project_log.id as project_id',
            'project_log.score as project_score',
            'users.name as user_name',
            'quest_completion.id as quest_completion_id',
            'quest_completion.quest_type as quest_completion_type',
        ])
            ->whereIn('subscription.id', function ($query) use ($user) {
                $query->select(DB::raw('MAX(id)'))
                ->from('subscription')
                ->where('user_id', $user->id)
                    ->where('status', 'paid')
                    ->groupBy('class_id');
            })
            ->where('quest_completion.user_id', $user->id)
            ->where('project_log.user_id', $user->id)
            ->where('quest_completion.quest_type', 'posttest')
            ->get();

        $check_undone_class = Subscription::join('classes', 'classes.id', '=', 'subscription.class_id')
        ->join('quest', 'quest.class_id', '=', 'classes.id')
        ->join('users', 'users.id', '=', 'classes.user_id')
        ->leftJoin('quest_completion AS posttest_completion', function ($join) use ($user) {
            $join->on('posttest_completion.quest_id', '=', 'quest.id')
            ->where('posttest_completion.user_id', $user->id)
                ->where('posttest_completion.quest_type', 'posttest');
        })
            ->join('quest_completion AS pretest_completion', function ($join) use ($user) {
                $join->on('pretest_completion.quest_id', '=', 'quest.id')
                ->where('pretest_completion.user_id', $user->id)
                    ->where('pretest_completion.quest_type', 'pretest');
            })
            ->select([
                'classes.*',
                'subscription.user_id as user_id',
                'users.name as user_name',
                'pretest_completion.id as pretest_completion_id',
                'pretest_completion.quest_type as pretest_completion_type',
            ])
            ->whereIn('subscription.id', function ($query) use ($user) {
                $query->select(DB::raw('MAX(id)'))
                ->from('subscription')
                ->where('user_id', $user->id)
                    ->where('status', 'paid')
                    ->groupBy('class_id');
            })
            ->whereNull('posttest_completion.id')
            ->get();
            

        return view('studo.pages.setting.index', [
            'user' => $user,
            'subscriptions' => $subscriptions,
            'check_done_class' => $check_done_class,
            'check_undone_class' => $check_undone_class,
        ]);
    }

    public function indexAdmin()
    {
        if (!auth()->check()) {
            return redirect()->route('studo.index')->with('error', 'Harus Login terlebih dahulu');
        }

        $user = User::find(auth()->user()->id);
        $avatar = auth()->user()->avatar;

        return view('studo.pages.setting.indexAdmin', [
            'user' => $user,
            'avatar' => $avatar
        ]);
    }
    public function updateProfile(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'phone_number' => 'nullable',
        ]);

        $user = User::find($id);

        $user->name = $request->name ?? null;
        $user->phone_number = $request->phone_number ?? null;

        $user->save();

        return back()->with('success', 'Biodata berhasil diperbaharui');
    }

    public function updateProfilePhoto(Request $request)
    {
        $rules = [
            'avatar' => 'nullable|mimes:png,jpg,jpeg,svg',
        ];

        $request->validate($rules);

        $user = auth()->user();

        // handle file upload
        if ($request->hasFile('avatar')) {
            // get file
            $file = $request->file('avatar');

            // generate unique name for the file
            $filename = time() . '.' . $file->getClientOriginalExtension();

            // save file to public/avatars directory
            $path = $file->storeAs('avatarProject', $filename, 'public');

            // save file name to database
            $user->avatar = $path;
        }

        $user->save();

        return back()->with('success', 'Foto profil berhasil diperbaharui');
    }

    public function updatePassword(Request $request)
    {
        // Validasi input
        $request->validate([
            'password_lama' => 'required',
            'password_baru' => 'required',
            'konfirmasi_password' => 'required|same:password_baru',
        ]);
    
        // Mendapatkan user yang sedang login
        $user = User::find(auth()->user()->id);
    
        // Memeriksa apakah password lama sesuai dengan yang ada di database
        if (Hash::check($request->password_lama, $user->password)) {
            // Memperbarui password baru
            $user->password = Hash::make($request->password_baru);
            $user->save();
    
            return back()->with('success', 'Password berhasil diperbarui');
        } else {
            return back()->with('error', 'Password lama tidak sesuai');
        }
    }

    public function generateCertificate(User $user)
    {
        $data_certificate = Subscription::join('classes', 'classes.id', '=', 'subscription.class_id')
        ->join('users', 'users.id', '=', 'subscription.user_id')
        ->select([
            'subscription.*',
            'users.id as user_id',
            'users.name as user_name',
            'classes.name as class_name',
        ])
            ->where('subscription.user_id', $user->id)
            ->first();

        // Logika pembuatan sertifikat
        $certificateData = [
            'user_name' => $data_certificate->user_name,
            'class_name' => $data_certificate->class_name,
            // Tambahan data lain yang dibutuhkan
        ];

        // Generate sertifikat sebagai file PDF
        $pdf = PDF::loadView('certificate.template', $certificateData)->setPaper('a4', 'landscape');

        // Simpan sertifikat ke file atau lakukan tindakan lain seperti pengiriman email
        $pdf->save(storage_path('app/public/storage/certificates/' . $user->id . '.pdf'));

        // Tampilkan sertifikat kepada pengguna atau lakukan tindakan lain seperti pengunduhan
        return $pdf->stream('certificate.pdf');
    }
}
