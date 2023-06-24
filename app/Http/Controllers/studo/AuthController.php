<?php

namespace App\Http\Controllers\studo;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
     /**
     * Redirect the user to the Google authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Obtain the user information from Google.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleGoogleCallback()
    {
        $user = Socialite::driver('google')->user();
        $finduser = User::where('google_id', $user->id)->first();
        if($finduser){
            Auth::login($finduser);
            return redirect()->route('studo.index')->with('success', 'Berhasil Login');
        } else {
            $newUser = User::create([
                'name' => $user->name,
                'email' => $user->email,
                'google_id'=>  $user->id,
                'role_id' =>  1,
                'password' => encrypt('123456dummy')
            ]);

            Auth::login($newUser);

            return redirect()->route('studo.index')->with('success', 'Berhasil Login');
            
        }
    }

    public function getSignout()
    {
        auth()->logout();
        return redirect()->route('studo.index')->with('success', 'Berhasil Logout');
    }

    public function postLogin(Request $request, $slug = null, $chapter_id = null)
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
        $userCheck = User::where('email', $email)->first();
        if (!$userCheck) {
            return back()->with('error', 'Email kamu belum atau tidak terdaftar');
        }

        // Cek jika role id pengguna adalah 1
        if ($userCheck->role_id != 1) {
            return back()->with('error', 'Maaf, Anda tidak memiliki akses untuk login');
        }

        if (!auth()->attempt($credentials)) {
            if ($password == $userCheck->password) {
                Auth::loginUsingId(User::where('email', $email)->first()->id);
            } else {
                return back()->with('error', 'Oops, email atau password yang kamu masukkan salah. Silakan coba lagi ');
            }
        }
        return redirect()->route('studo.index')->with('success', 'Berhasil Login');
    }

    public function postSignup(Request $request, $slug = null, $chapter_id = null)
    {
        $request->validate([
            'email' => 'required|email|unique:users,email',
            'name' => 'required',
            'password' => 'required',
        ]);

        try {
            DB::transaction(function () use ($request) {
                $user = new User;
                $user->name = $request->name;
                $user->email = $request->email;
                $user->role_id = 1;
                $user->password = bcrypt($request->password);
                $user->save();

                // Lakukan login otomatis setelah pendaftaran
                Auth::login($user);
            });

            return redirect()->route('studo.index')->with('success', 'Berhasil Login');
        } catch (Exception $e) {
            return back()->with('error', 'Internal Server Error');
        }
    }
}
