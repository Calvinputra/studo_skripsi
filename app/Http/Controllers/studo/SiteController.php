<?php

namespace App\Http\Controllers\studo;

use App\Http\Controllers\Controller;
use App\Models\Classes;
use App\Models\Goal;
use App\Models\Subscription;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class SiteController extends Controller
{
    public function index()
    {
    if (auth()->check()){
        $user = User::find(auth()->user()->id);
            $subscriptions = Subscription::join('classes', 'classes.id', '=', 'subscription.class_id')
            ->join('users', 'users.id', '=', 'classes.user_id')
            ->leftJoin('chapters', function ($join) {
                $join->on('chapters.class_id', '=', 'classes.id')
                ->whereRaw('chapters.id = (SELECT MIN(id) FROM chapters WHERE class_id = classes.id)');
            })
                ->leftJoin('chapter_log', function ($join) use ($user) {
                    $join->on('chapter_log.chapter_id', '=', 'chapters.id')
                    ->where('chapter_log.user_id', $user->id);
                })
                ->select([
                    'classes.id as id',
                    'classes.name as name',
                    'classes.thumbnail as thumbnail',
                    'classes.slug as slug',
                    'users.id as user_id',
                    'users.name as tutor_name',
                    'users.email as tutor_email',
                    'chapters.id as chapter_id',
                    'chapters.name as chapter_name',
                    DB::raw('(SELECT COUNT(id) FROM chapter_log WHERE chapter_log.chapter_id IN (SELECT id FROM chapters WHERE chapters.class_id = classes.id) AND chapter_log.user_id = ' . $user->id . ') AS completed_count'),  // tambahkan ini untuk menghitung total jumlah completed_count yang tidak melebihi total_count dari kelas yang sama
                    DB::raw('(SELECT COUNT(id) FROM chapters WHERE chapters.class_id = classes.id) AS total_count'),  // tambahkan ini untuk menghitung total jumlah chapter dalam kelas
                ])
                ->whereIn('subscription.id', function ($query) use ($user) {
                    $query->select(DB::raw('MAX(id)'))
                    ->from('subscription')
                    ->where('user_id', $user->id)
                        ->where('status', 'paid')
                        ->groupBy('class_id');
                })
                ->groupBy('classes.id', 'classes.name', 'classes.slug', 'chapters.id', 'chapters.name', 'classes.thumbnail', 'users.id', 'users.name', 'users.email')
                ->get();
        
        $classes_subs = Classes::join('users', 'users.id', '=', 'classes.user_id')
        ->join('subscription', 'subscription.class_id', '=', 'classes.id')
        ->select([
            'classes.*',
            'users.name as tutor_name',
            'users.email as tutor_email',
        ])
        ->orderBy('classes.created_at', 'desc')
        ->where('subscription.status', 'paid')->get();

        $arr_pd_id = [];
            foreach ($subscriptions as $class) {
                // $enrolled_thumbnail = Storage::disk('s3')->url(env('KELAS_AWS_BUCKET_ROOT') . '/program_digital/upload/files/img/thumbnail/' . $class->thumbnail);
                // $arr_class['enrolled_thumbnail'][] = $enrolled_thumbnail;
                $arr_pd_id[] = $class->id;
            }
            $classes = Classes::join('users', 'users.id', '=', 'classes.user_id')
                ->select([
                    'classes.*',
                    'users.id as user_id',
                    'users.name as tutor_name',
                ])->whereNotIn('classes.id', $arr_pd_id)->get();

            $currentDate = date('Y-m-d');

            $list_goals = Goal::join('subscription', 'subscription.id', '=', 'goals.subscription_id')
            ->join('classes', 'classes.id', '=', 'subscription.class_id')
            ->join('users', 'users.id', '=', 'subscription.user_id')
            ->select([
                'goals.*',
                'classes.name as class_name',
            ])
            ->where('users.id', auth()->user()->id)
            ->whereDate('goals.end_date', '>=', $currentDate) // Memfilter berdasarkan tanggal
            ->take(3) // Membatasi maksimal 3 hasil
            ->get();
    }
    else{
        $user = NULL;
        $subscriptions = NULL;
        $classes_subs = null;
        $list_goals = null;


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
            'subscriptions' => $subscriptions,
            'list_goals' => $list_goals,
            // 'count_chapter' => $count_chapter
        ]);
    }
}