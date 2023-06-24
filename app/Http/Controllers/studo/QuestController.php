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
        $user = User::find(auth()->user()->id);
        $class = Classes::join('users', 'users.id', '=', 'classes.user_id')
        ->select([
            'classes.*',
            'users.name as tutor_name',
            'users.email as tutor_email',
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

        $check_pretest = QuestCompletion::join('quest', 'quest.id', '=', 'quest_completion.quest_id')
        ->join('classes', 'classes.id', '=', 'quest.class_id')
        ->where('slug', $slug)
        ->where('quest_type', 'pretest')
        ->where('quest_completion.user_id', Auth()->user()->id)->first();

        if (!$check_pretest) {
            return view('studo.pages.quest.pre-test', [
                'class' => $class,
                'user' => $user,
                'pretests' => $pretests,
            ]);
        }else{
            return redirect()->route('studo.pages.quest.pre-test.result', ['slug' => $slug])->with('success', 'Kamu sudah menyelesaikan Pre-Test !');
        }
    }
    public function postPreTest(Request $request, $slug)
    {
        $class = Classes::join('users', 'users.id', '=', 'classes.user_id')
        ->select([
            'classes.*',
            'users.name as tutor_name',
            'users.email as tutor_email',
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
                    'answer'                => $answer,
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

        return redirect()->route('studo.pages.quest.pre-test.result',['slug' => $slug]);
    }

    public function resultPreTest($slug)
    {
        $user = User::find(auth()->user()->id);
        $class = Classes::join('users', 'users.id', '=', 'classes.user_id')
        ->leftJoin('chapters', 'chapters.class_id', '=', 'classes.id')
        ->select([
            'classes.*',
            'users.name as tutor_name',
            'users.email as tutor_email',
            'chapters.id as chapter_id',
        ])
            ->where('slug', $slug)
            ->where('status', 'active')
            ->first();

        if (!$class) {
            return redirect()->route('studo.index')->with('error', 'Quest ini tidak ditemukan !');
        }

        $score = QuestCompletion::join('quest', 'quest.id', '=', 'quest_completion.quest_id')
        ->join('classes', 'classes.id', '=', 'quest.class_id')
        ->where('slug', $slug)
        ->where('quest_type', 'pretest')
        ->where('quest_completion.user_id',Auth()->user()->id)->first();

        return view('studo.pages.quest.result-pre-test', [
            'class' => $class,
            'user' => $user,
            'score' => $score
        ]);
    }

    public function indexPostTest($slug)
    {
        $user = User::find(auth()->user()->id);
        $class = Classes::join('users', 'users.id', '=', 'classes.user_id')
        ->select([
            'classes.*',
            'users.name as tutor_name',
            'users.email as tutor_email',
        ])->where('slug', $slug)->where('status', 'active')->first();

        if (!$class) {
            return redirect()->route('studo.index')->with('error', 'Quest ini tidak ditemukan !');
        }

        $posttests = Quest::with(['class', 'questions' => function ($query) {
            $query->where('quest_type', 'posttest');
        }, 'questions.answers'])
        ->where('class_id', $class->id)
        ->get();

        $check_posttest = QuestCompletion::join('quest', 'quest.id', '=', 'quest_completion.quest_id')
        ->join('classes', 'classes.id', '=', 'quest.class_id')
        ->where('slug', $slug)
        ->where('quest_type', 'posttest')
        ->where('score', '>=', 70)
        ->where('quest_completion.user_id', Auth()->user()->id)->first();

        if (!$check_posttest) {
            return view('studo.pages.quest.post-test', [
                'class' => $class,
                'user' => $user,
                'posttests' => $posttests,
            ]);
        } else {
            return redirect()->route('studo.pages.quest.post-test.result', ['slug' => $slug])->with('success', 'Kamu sudah menyelesaikan Post-Test !');
        }
    }

    public function postPostTest(Request $request, $slug)
    {
        $class = Classes::join('users', 'users.id', '=', 'classes.user_id')
        ->select([
            'classes.*',
            'users.name as tutor_name',
            'users.email as tutor_email',
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
                    'answer'                => $answer,
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
            'quest_type'     => "posttest",
        ], [
            'score'         => number_format($score, 1),
        ]);

        return redirect()->route('studo.pages.quest.post-test.result', ['slug' => $slug]);
    }

    public function resultPostTest($slug)
    {
        $user = User::find(auth()->user()->id);
        $class = Classes::join('users', 'users.id', '=', 'classes.user_id')
        ->leftJoin('chapters', 'chapters.class_id', '=', 'classes.id')
        ->select([
            'classes.*',
            'users.name as tutor_name',
            'users.email as tutor_email',
            'chapters.id as chapter_id',
        ])
            ->where('slug', $slug)
            ->where('status', 'active')
            ->first();

        if (!$class) {
            return redirect()->route('studo.index')->with('error', 'Quest ini tidak ditemukan !');
        }

        $score = QuestCompletion::join('quest', 'quest.id', '=', 'quest_completion.quest_id')
        ->join('classes', 'classes.id', '=', 'quest.class_id')
        ->where('slug', $slug)
            ->where('quest_type', 'posttest')
            ->where('quest_completion.user_id', Auth()->user()->id)->first();

        return view('studo.pages.quest.result-post-test', [
            'class' => $class,
            'user' => $user,
            'score' => $score
        ]);
    }

}