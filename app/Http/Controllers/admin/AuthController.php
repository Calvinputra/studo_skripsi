<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index()
    {
        if (auth()->check()) {
            $user = User::find(auth()->user()->id);
            $check_user = User::where('id', $user->id)->where('role_id', 3)->first();
            if ($check_user) {
                return view('admin.pages.dashboard.index', []);
            } else {
                return redirect()->route('studo.index')->with('error', 'Kamu harus Logout dari akun User Terlebih dahulu');
            }
        }
        
        return view('admin.pages.auth.signin', [
        ]);
    }

    public function regist(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $email = $request->email;
        $password = $request->password;

        $credentials = [
            'email' => $email,
            'password' => $password
        ];
        $tutorCheck = User::where('email', $email)->first();
        if (!$tutorCheck) {
            return back()->with('error', 'Email kamu belum atau tidak terdaftar');
        }
        if (!auth()->attempt($credentials)) {
            if (Hash::check($password, $tutorCheck->password)) {
                Auth::guard('admin')->loginUsingId(User::where('email', $email)->first()->id);
            } else {
                return back()->with('error', 'Oops, email atau password yang kamu masukkan salah. Silakan coba lagi ');
            }
        }
        return redirect()->route('admin.pages.dashboard.index')->with('success', 'Login sebagai Admin Berhasil');
    }

}
