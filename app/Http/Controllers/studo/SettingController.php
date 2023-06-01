<?php

namespace App\Http\Controllers\studo;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SettingController extends Controller
{
    public function index()
    {
        if(!auth()->check()){
            return redirect()->route('studo.index')->with('error','Harus Login terlebih dahulu');
        }
        $user = User::find(auth()->user()->id);
        $avatar = auth()->user()->avatar;

        return view('studo.pages.setting.index', [
            'user' => $user,
            'avatar' => $avatar
        ]);
    }
    public function indexAdmin()
    {
        if(!auth()->check()){
            return redirect()->route('studo.index')->with('error','Harus Login terlebih dahulu');
        }
        $user = User::find(auth()->user()->id);
        $avatar = auth()->user()->avatar;

        return view('studo.pages.setting.indexAdmin', [
            'user' => $user,
            'avatar' => $avatar
        ]);
    }

    public function updateProfile(Request $request, $id){
        $request->validate([
            'email' => 'nullable|email',
            'name' => 'nullable',
            'phone_number' => 'nullable',
        ]);

        $user = User::find(auth()->user()->id);

        $user->email = $request->email ? $request->email : null;
        $user->name = $request->name ? $request->name : null;
        $user->phone_number = $request->phone_number ? $request->phone_number : null;
        $user->save();

        return back()->with('success', 'Biodata berhasil diperbaharui');
    }
    public function updateProfilePhoto(Request $request, $id)
    {
        $rules = [
            'photo' => 'nullable|mimes:png,jpg,jpeg,svg,',
        ];

        $request->validate($rules);
        $avatar = auth()->user()->avatar;

        $user = User::find(auth()->user()->id);
        if ($request->hasFile('photo')) {
            if ($request->file('photo')->isValid()) {
                $file = str_slug(auth()->user()->name) . '-' . str_random(4) . '-' . str_random(10) . '.jpg';
                $user->avatar = $file;
                $cover = Image::make($_FILES['photo']['tmp_name']); // original
                $cover->backup();

                $cover->reset();
                $cover->fit(300);

                $extension = $request->file('photo')->getClientOriginalExtension();

                $targetDir = env('KELAS_AWS_BUCKET_ROOT') . '/upload/files/img/avatar/300-' . $file;

                $uploadFile = $cover->encode($extension);
                Storage::disk('s3')->put($targetDir, $uploadFile, 'public');

                $path = './' . env('KELAS_AWS_BUCKET_ROOT') . '/upload/files/img/avatar/300-' . $avatar;

                if (file_exists($path)) {
                    unlink($path);
                }
            }
        }

        $user->save();

        return back()->with('success', 'Foto profil berhasil diperbaharui');
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
}
