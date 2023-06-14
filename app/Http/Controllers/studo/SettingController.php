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
            'email' => 'nullable|email',
            'name' => 'nullable',
            'phone_number' => 'nullable',
        ]);

        $user = User::find(auth()->user()->id);

        $user->email = $request->email ?? null;
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
        $avatar = $user->avatar;

        if ($request->hasFile('avatar') && $request->file('avatar')->isValid()) {
            $file = Str::slug($user->name) . '-' . Str::random(4) . '-' . Str::random(10) . '.jpg';
            $user->avatar = $file;

            // Ambil ekstensi file asli
            $extension = $request->file('avatar')->getClientOriginalExtension();

            // Anda bisa langsung menentukan direktori target sebagai 'upload/files/img/avatar/' tanpa menambahkan $file
            $targetDir = 'upload/files/img/avatar/';

            // Simpan file ke penyimpanan lokal (misalnya: folder public)
            $request->file('avatar')->storeAs('public/' . $targetDir, $file);

            // Hapus file avatar lama jika ada
            $path = 'upload/files/img/avatar/' . $file;

            if (Storage::disk('public')->exists($path)) {
                Storage::disk('public')->delete($path);
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
