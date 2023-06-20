<?php

namespace App\Http\Controllers\internal;

use App\Http\Controllers\Controller;
use App\Models\Tutor;
use App\Models\User;
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
            // 'name' => 'required',
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
            });

            return back()->with('success', 'Daftar Berhasil. Silahkan Login');
        } catch (Exception $e) {
            return back()->with('error', 'Internal Server Error: ' . $e->getMessage());
        }
    }
}
