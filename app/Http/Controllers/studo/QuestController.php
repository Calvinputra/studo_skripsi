<?php

namespace App\Http\Controllers\studo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\studo\QuestController;

class QuestController extends Controller
{
    public function indexPreTest()
    {
    if (auth()->check()){
        $user = User::find(auth()->user()->id);
    }
    else{
        $user = NULL;
    }
        return view('studo.pages.quest.pre-test', [
            'user' => $user,
        ]);
    }
}