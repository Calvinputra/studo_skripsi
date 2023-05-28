<?php

namespace App\Http\Controllers;

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

        return view('studo.pages.setting.indexAdmin', [
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

        return view('studo.pages.setting.profileAdmin', [
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
