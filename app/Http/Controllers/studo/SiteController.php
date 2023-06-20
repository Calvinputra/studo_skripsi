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
        $subscriptions = Subscription::join('classes', 'classes.id', '=', 'subscription.class_id')
        ->join('users', 'users.id', '=', 'subscription.user_id')
        ->select([
            'classes.*',
            'users.id as user_id',
            'users.name as tutor_name',
            'users.email as tutor_email',
            ])
        ->where('users.id', $user->id)->get();
        
        $classes_subs = Classes::join('users', 'users.id', '=', 'classes.user_id')
        ->join('subscription', 'subscription.class_id', '=', 'classes.id')
        ->select([
            'classes.*',
            'users.name as tutor_name',
            'users.email as tutor_email',
        ])
        ->orderBy('classes.created_at', 'desc')
        ->get();

        $arr_pd_id = [];
            foreach ($classes_subs as $class) {
                // $enrolled_thumbnail = Storage::disk('s3')->url(env('KELAS_AWS_BUCKET_ROOT') . '/program_digital/upload/files/img/thumbnail/' . $class->thumbnail);
                // $arr_class['enrolled_thumbnail'][] = $enrolled_thumbnail;
                $arr_pd_id[] = $class->id;
            }
            $classes = Classes::whereNotIn('id', $arr_pd_id)->get();
    }
    else{
        $user = NULL;
        $subscriptions = NULL;
        $classes_subs = null;

        $classes = Classes::join('users', 'users.id', '=', 'classes.user_id')
        ->select([
            'classes.*',
            'users.name as tutor_name',
            'users.email as tutor_email',
        ])
        ->orderBy('classes.created_at', 'desc')
        ->get();
    }
        return view('studo.pages.site.index', [
            'user' => $user,
            'classes' => $classes,
            'subscriptions' => $subscriptions
        ]);
    }
}