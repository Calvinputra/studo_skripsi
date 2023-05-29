<?php

namespace App\Http\Controllers\internal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function indexAdmin()
    {
        if(!auth()->check()){
            return redirect()->route('studo.index')->with('error','Harus Login terlebih dahulu');
        }
        $user = User::find(auth()->user()->id);
        $avatar = auth()->user()->avatar;

        return view('internal_tutor.pages.index', [
            'user' => $user,
            'avatar' => $avatar
        ]);
    }
    
    public function profileAdmin()
    {
        if(!auth()->check()){
            return redirect()->route('studo.index')->with('error','Harus Login terlebih dahulu');
        }
        $user = User::find(auth()->user()->id);
        $avatar = auth()->user()->avatar;

        return view('internal_tutor.pages.profileAdmin', [
            'user' => $user,
            'avatar' => $avatar
        ]);
    }

    public function informasiAdmin()
    {
        if(!auth()->check()){
            return redirect()->route('studo.index')->with('error','Harus Login terlebih dahulu');
        }
        $user = User::find(auth()->user()->id);
        $avatar = auth()->user()->avatar;

        return view('studo.pages.admin.kelasBaru', [
            'user' => $user,
            'avatar' => $avatar
        ]);
    }
}
