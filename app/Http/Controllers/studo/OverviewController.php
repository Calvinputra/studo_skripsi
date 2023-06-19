<?php

namespace App\Http\Controllers\studo;

use App\Http\Controllers\Controller;
use App\Models\Chapter;
use App\Models\Classes;
use App\Models\Subscription;
use Illuminate\Http\Request;

class OverviewController extends Controller
{
    public function index($slug)
    {
        $class = Classes::join('tutors', 'tutors.id', '=', 'classes.tutor_id')
        ->select([
            'classes.*',
            'tutors.name as tutor_name',
            'tutors.email as tutor_email',
        ])->where('slug', $slug)->where('status', 'active')->first();

        if (!$class) {
            return redirect()->route('studo.index')->with('error', 'Kelas ini tidak ditemukan !');
        }
        if(auth()->check())
        {
            $subscription = Subscription::where('class_id', $class->id)->where('user_id', auth()->user()->id)->first();

        }else{
             $subscription = null;
        }

        $points = preg_split("/\r?\n/", $class->competency_unit);
        $total_duration = Chapter::where('class_id', $class->id)
        ->sum('duration');

        $chapters = Chapter::where('class_id', $class->id)->orderBy('priority', 'ASC')->get();
        $count_video = Chapter::where('type', 'video')->where('class_id', $class->id)->count();
        $count_reading = Chapter::where('type', 'reading')->where('class_id', $class->id)->count();
        $count_chapter = Chapter::where('class_id', $class->id)->count();

        return view('studo.pages.overview.index', [
            'class' => $class,
            'points' => $points,
            'total_duration' => $total_duration,
            'chapters' => $chapters,
            'count_video' => $count_video,
            'count_reading' => $count_reading,
            'count_chapter' => $count_chapter,
            'subscription' => $subscription
        ]);

    }
}
