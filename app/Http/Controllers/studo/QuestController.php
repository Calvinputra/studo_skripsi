<?php

namespace App\Http\Controllers\studo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Classes;
use App\Models\Quest;
use App\Models\QuestAnswer;
use App\Models\QuestCompletion;
use Carbon\Carbon;

class QuestController extends Controller
{
    public function indexPreTest($slug)
    {
        $class = Classes::join('tutors', 'tutors.id', '=', 'classes.tutor_id')
        ->select([
            'classes.*',
            'tutors.name as tutor_name',
            'tutors.email as tutor_email',
        ])->where('slug', $slug)->where('status', 'active')->first();

        if (!$class) {
            return redirect()->route('studo.index')->with('error', 'Quest ini tidak ditemukan !');
        }

        // $pretests = Quest::join('classes', 'classes.id', '=', 'quest.class_id')
        // ->join('quest_question', 'quest_question.quest_id', '=', 'quest.id')
        // ->join('quest_answer', 'quest_answer.id', '=', 'quest.class_id')
        // ->select([
        //     'quest.*',
        //     'quest_question.question as question',
        //     'quest_question.priority as priority',
        //     'quest_answer.answer as answer',
        //     'quest_answer.is_correct as correct',
        //     ])
        // ->where('quest_type', 'pretest')
        // ->get();

        $pretests = Quest::with(['class', 'questions' => function ($query) {
            $query->where('quest_type', 'pretest');
        }, 'questions.answers'])
        ->where('class_id', $class->id)
        ->get();


        return view('studo.pages.quest.pre-test', [
            'class' => $class,
            'pretests' => $pretests,
        ]);
    }
    public function postPreTest(Request $request, $slug)
    {
        $class = Classes::join('tutors', 'tutors.id', '=', 'classes.tutor_id')
        ->select([
            'classes.*',
            'tutors.name as tutor_name',
            'tutors.email as tutor_email',
        ])->where('slug', $slug)->where('status', 'active')->first();

        if (!$class) {
            return redirect()->route('studo.index')->with('error', 'Quest ini tidak ditemukan !');
        }

        $quest = Quest::where('class_id', $class->id)->first();

        // Count answers
        $answers    = $request->answers;
        $score      = 0;
        $answeredCount = 0;

        foreach ($answers as $key => $answer) {
            if ($answer) {
                $correct = optional(QuestAnswer::where([
                    'id'                => $answer,
                    'quest_question_id'  => $key,
                ])->first());

                if ($correct->is_correct) {
                    $score++;
                }

                $answeredCount++;
            }
        }

        $score = $answeredCount > 0 ? ($score / $answeredCount) * 100 : 0;

        $quiz_completion = QuestCompletion::updateOrCreate([
            'quest_id'       => $quest->id,
            'user_id'       => Auth()->user()->id,
            'quest_type'     => "pretest",
        ], [
            'score'         => number_format($score, 1),
        ]);

        return view('studo.pages.quest.result-pre-test', [
            'class' => $class,
        ]);
    }

    public function resultPreTest()
    {

        return view('studo.pages.quest.result-pre-test');
    }

    public function indexPostTest()
    {
        if (auth()->check()){
            $user = User::find(auth()->user()->id);
        }
        
        else{
            $user = NULL;
        }

        return view('studo.pages.quest.post-test', [
            'user' => $user,
        ]);
    }

    public function resultPostTest()
    {
        return view('studo.pages.quest.result-post-test');
    }

}