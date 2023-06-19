<?php

namespace App\Http\Controllers\studo;

use App\Http\Controllers\Controller;
use App\Models\Classes;
use App\Models\Subscription;
use Illuminate\Http\Request;
use App\Models\User;

class SiteController extends Controller
{
    public function index()
    {
    if (auth()->check()){
        $user = User::find(auth()->user()->id);
        $subscription = Subscription::join('classes', 'classes.id', '=', 'subscription.class_id')
        ->join('tutors', 'tutors.id', '=', 'subscription.tutor_id')
        ->select([
            'classes.*',
            'tutors.name as tutor_name',
            'tutors.email as tutor_email',
            ])
        ->where('user_id', $user->id)->get();
    }
    else{
        $user = NULL;
        $subscription = NULL;
    }
        $classes = Classes::join('tutors', 'tutors.id', '=', 'classes.tutor_id')
        ->select([
            'classes.*',
            'tutors.name as tutor_name',
            'tutors.email as tutor_email',
        ])->get();


        return view('studo.pages.site.index', [
            'user' => $user,
            'classes' => $classes,
            'subscription' => $subscription
        ]);
    }
}