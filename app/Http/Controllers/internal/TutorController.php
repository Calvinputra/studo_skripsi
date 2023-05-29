<?php

namespace App\Http\Controllers\internal;

use App\Http\Controllers\Controller;
use App\Models\Tutor;
use Illuminate\Http\Request;
use App\Models\User;

class TutorController extends Controller
{
    public function index()
    {
        if(!auth()->check()){
            return redirect()->route('internal_tutor.index')->with('error','Harus Login terlebih dahulu');
        }
        $tutor = Tutor::find(auth()->user()->id);
        $avatar = auth()->user()->avatar;

        return view('internal_tutor.pages.index', [
            'tutor' => $tutor,
            'avatar' => $avatar
        ]);
    }
    
    public function profile()
    {
        if(!auth()->check()){
            return redirect()->route('internal_tutor.index')->with('error','Harus Login terlebih dahulu');
        }
        $user = User::find(auth()->user()->id);
        $avatar = auth()->user()->avatar;

        return view('internal_tutor.pages.profileTutor', [
            'user' => $user,
            'avatar' => $avatar
        ]);
    }
}
