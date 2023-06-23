<?php

namespace App\Http\Controllers\internal;

use App\Http\Controllers\Controller;
use App\Models\Classes;
use App\Models\ProjectLog;
use App\Models\Subscription;
use App\Models\Tutor;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Wallet;
use Illuminate\Support\Facades\Hash;

class TutorController extends Controller
{
    public function index()
    {
        if(!auth()->check()){
            return redirect()->route('internal_tutor.index')->with('error','Harus Login terlebih dahulu');
        }
        $tutor = User::find(auth()->user()->id);
        $avatar = auth()->user()->avatar;
        
        $classes = Classes::where('user_id', $tutor->id)->get();
        $count_classes = Classes::where('user_id', '=', $tutor->id)->count();

        $sold_class = Subscription::join('classes', 'classes.id', '=', 'subscription.class_id')
        ->join('users', 'users.id', '=', 'classes.user_id')
        ->where('users.id',$tutor->id)->count();

        $check_balance = Wallet::join('users', 'users.id', '=', 'wallet.user_id')
        ->where('users.id', $tutor->id)->first();


        // $list_nilai_proyek = ProjectLog::join('users', 'users.id', '=', 'project_log.user_id')
        // ->leftJoin('quest_completion', function ($join) {
        //     $join->on('quest_completion.user_id', '=', 'project_log.user_id')
        //     ->where('quest_completion.quest_type', '=', 'posttest'); 
        // })
        //     ->select([
        //         'project_log.*',
        //         'users.name as user_name',
        //         'users.email as user_email',
        //         'quest_completion.quest_type as quest_type',
        //         'quest_completion.score as quest_score',
        //     ])
        //     ->whereIn('class_id', $classes->pluck('id')->toArray())
        //     ->get();

        return view('internal_tutor.pages.index', [
            'tutor' => $tutor,
            'classes' => $classes,
            'count_classes' => $count_classes,
            'sold_class' => $sold_class,
            'check_balance' => $check_balance,
            // 'list_nilai_proyek' => $list_nilai_proyek,
        ]);
    }
    
    public function profile()
    {
        if(!auth()->check()){
            return redirect()->route('internal_tutor.index')->with('error','Harus Login terlebih dahulu');
        }
        $tutor = User::find(auth()->user()->id);
        $avatar = auth()->user()->avatar;

        return view('internal_tutor.pages.profileTutor', [
            'tutor' => $tutor,
            'avatar' => $avatar
        ]);
    }
    public function updateProfile(Request $request, $id){
        $request->validate([
            'name' => 'nullable',
            'phone_number' => 'nullable',
        ]);

        $tutor = User::find(auth()->user()->id);

        $tutor->name = $request->name ? $request->name : null;
        $tutor->phone_number = $request->phone_number ? $request->phone_number : null;
        $tutor->save();

        return back()->with('success', 'Biodata berhasil diperbaharui');
    }

    public function updatePassword(Request $request)
    {
        // Validasi input
        $request->validate([
            'password_lama' => 'required',
            'password_baru' => 'required|min:8',
            'konfirmasi_password' => 'required|same:password_baru',
        ]);
    
        // Mendapatkan user yang sedang login
        $tutor = User::find(auth()->user()->id);
    
        // Memeriksa apakah password lama sesuai dengan yang ada di database
        if (Hash::check($request->password_lama, $tutor->password)) {
            // Memperbarui password baru
            $tutor->password = Hash::make($request->password_baru);
            $tutor->save();
    
            return back()->with('success', 'Password berhasil diperbarui');
        } else {
            return back()->with('error', 'Password lama tidak sesuai');
        }
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
}
