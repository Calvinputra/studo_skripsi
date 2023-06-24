<?php

namespace App\Http\Controllers\internal;

use App\Http\Controllers\Controller;
use App\Models\Tutor;
use App\Models\User;
use App\Models\Wallet;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
     /**
     * Redirect the user to the Google authentication page.
     *
     * @return \Illuminate\Http\Response
     */

    public function getsignin()
    {
        if (auth()->check()) {
            $user = User::find(auth()->user()->id);
            $check_user = User::where('id', $user->id)->where('role_id', 2)->first();
            if($check_user){
                return view('internal_tutor.pages.auth.signin', [
                ]);
            }else{
                return redirect()->route('studo.index')->with('error', 'Kamu harus Logout dari akun User Terlebih dahulu');
            }
        }

        return view('internal_tutor.pages.auth.signin', []);
    }
    public function getsignup()
    {
        if (auth()->check()) {
            $user = User::find(auth()->user()->id);
            $check_user = User::where('id', $user->id)->where('role_id', 2)->first();
            if ($check_user) {
                return view('internal_tutor.pages.auth.signin', []);
            } else {
                return redirect()->route('studo.index')->with('error', 'Kamu harus Logout dari akun User Terlebih dahulu');
            }
        }
        return view('internal_tutor.pages.auth.signup', []);
    }

    public function getSignout()
    {
        auth()->logout();
        return redirect()->route('internal_tutor.signin')->with('success', 'Berhasil Logout dari Akun Tutor');
    }

    public function postSignin(Request $request)
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

        // Cek jika role id pengguna adalah 2
        if ($tutorCheck->role_id != 2) {
            return back()->with('error', 'Maaf, Anda tidak memiliki akses untuk login sebagai Tutor');
        }

        if (!auth()->attempt($credentials)) {
            if (Hash::check($password, $tutorCheck->password)) {
                Auth::guard('users')->loginUsingId(User::where('email', $email)->first()->id);
            } else {
                return back()->with('error', 'Oops, email atau password yang kamu masukkan salah. Silakan coba lagi ');
            }
        }
        return redirect()->route('internal_tutor.index')->with('success', 'Login sebagi Tutor Berhasil');
    }


    public function postSignup(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users,email',
            'name' => 'required',
            'password' => 'required',
        ]);

        try {
            DB::transaction(function () use ($request) {
                $tutor = new User;
                $tutor->name = $request->name;
                $tutor->email = $request->email;
                $tutor->role_id = 2;
                $tutor->password = bcrypt($request->password);
                $tutor->save();

                $wallet = new Wallet;
                $wallet->user_id = $tutor->id;
                $wallet->balance = 0;
                $wallet->save();

                // Lakukan login otomatis setelah pendaftaran
                Auth::login($tutor);
            });

            return redirect()->route('internal_tutor.index')->with('success', 'Berhasil Logout dari Akun Tutor');
        } catch (Exception $e) {
            return back()->with('error', 'Internal Server Error: ' . $e->getMessage());
        }
    }
}
