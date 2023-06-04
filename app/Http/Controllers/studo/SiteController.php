<?php

namespace App\Http\Controllers\studo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class SiteController extends Controller
{
    public function index()
    {
    if (auth()->check()){
        $user = User::find(auth()->user()->id);
    }
    else{
        $user = NULL;
    }
        return view('studo.pages.site.index', [
            'user' => $user,
        ]);
    }
}