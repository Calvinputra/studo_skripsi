<?php

namespace App\Http\Controllers\studo;

use App\Http\Controllers\Controller;
use App\Models\Chapter;
use App\Models\ChapterLog;
use App\Models\Classes;
use App\Models\Project;
use App\Models\QuestCompletion;
use App\Models\Subscription;
use Illuminate\Http\Request;

class OverviewController extends Controller
{
    public function index($slug, $chapter = null)
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
            $project = Project::where('class_id', $class->id)->first();
        }else{
            $subscription = null;
            $project = null;
        }

        $points = preg_split("/\r?\n/", $class->competency_unit);
        $total_duration = Chapter::where('class_id', $class->id)
        ->sum('duration');

        $chapters = Chapter::where('class_id', $class->id)->orderBy('priority', 'ASC')->get();
        $count_video = Chapter::where('type', 'video')->where('class_id', $class->id)->count();
        $count_reading = Chapter::where('type', 'reading')->where('class_id', $class->id)->count();
        $count_chapter = Chapter::where('class_id', $class->id)->count();

        $all_chapter = Chapter::where('class_id', $class->id)
        ->orderBy('priority', 'ASC')->get();

        $chapter_log = ChapterLog::join('chapters', 'chapters.id', '=', 'chapter_log.chapter_id')
        ->join('classes', 'classes.id', '=', 'chapters.class_id')->get();

        $check_pretest = QuestCompletion::join('quest', 'quest.id', '=', 'quest_completion.quest_id')
        ->join('classes', 'classes.id', '=', 'quest.class_id')
        ->where('slug', $slug)
        ->where('quest_type', 'pretest')
        ->where('user_id', Auth()->user()->id)->first();

        $check_posttest = QuestCompletion::join('quest', 'quest.id', '=', 'quest_completion.quest_id')
        ->join('classes', 'classes.id', '=', 'quest.class_id')
        ->where('slug', $slug)
        ->where('quest_type', 'posttest')
        ->where('score', '>=', 70)
        ->where('user_id', Auth()->user()->id)->first();

        return view('studo.pages.overview.index', [
            'class' => $class,
            'points' => $points,
            'total_duration' => $total_duration,
            'chapters' => $chapters,
            'count_video' => $count_video,
            'count_reading' => $count_reading,
            'count_chapter' => $count_chapter,
            'subscription' => $subscription,
            'project' => $project,
            'all_chapter' => $all_chapter,
            'check_pretest' => $check_pretest,
            'check_posttest' => $check_posttest,
            'chapter_log' => $chapter_log,
        ]);

    }
}
