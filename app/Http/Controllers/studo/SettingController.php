<?php

namespace App\Http\Controllers\studo;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Hash;

class SettingController extends Controller
{
    public function index()
    {
        if (!auth()->check()) {
            return redirect()->route('studo.index')->with('error', 'Harus Login terlebih dahulu');
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
}
