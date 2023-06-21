<?php

namespace App\Http\Controllers\studo;

use App\Http\Controllers\Controller;
use App\Models\Chapter;
use App\Models\ChapterLog;
use App\Models\Classes;
use App\Models\Forum;
use App\Models\Leaderboard;
use App\Models\Project;
use App\Models\ProjectLog;
use App\Models\QuestCompletion;
use App\Models\ReplyForum;
use App\Models\Subscription;
use App\Models\User;
use Illuminate\Http\Request;

class OverviewController extends Controller
{
    public function index($slug, $chapter_id = null)
    {
        $class = Classes::join('users', 'users.id', '=', 'classes.user_id')
        ->select([
            'classes.*',
            'users.name as tutor_name',
            'users.email as tutor_email',
        ])->where('slug', $slug)->where('status', 'active')->first();

        if (!$class) {
            return redirect()->route('studo.index')->with('error', 'Kelas ini tidak ditemukan !');
        }
        if(auth()->check())
        {
            $user = User::find(Auth()->user()->id);
            $subscription = Subscription::where('class_id', $class->id)->where('user_id', auth()->user()->id)->where('status','paid')->first();
            $project = Project::where('class_id', $class->id)->first();
            $check_pretest = QuestCompletion::join('quest', 'quest.id', '=', 'quest_completion.quest_id')
            ->join('classes', 'classes.id', '=', 'quest.class_id')
            ->where('slug', $slug)
            ->where('quest_type', 'pretest')
            ->where('quest_completion.user_id', Auth()->user()->id)->first();

            $check_posttest = QuestCompletion::join('quest', 'quest.id', '=', 'quest_completion.quest_id')
            ->join('classes', 'classes.id', '=', 'quest.class_id')
            ->where('slug', $slug)
            ->where('quest_type', 'posttest')
            ->where('score', '>=', 70)
            ->where('quest_completion.user_id', Auth()->user()->id)->first();

            if (!$chapter_id) {
                $chapter = null;
                $embedUrl = null;
                $list_forum = null;
                $reply_forum = null;
            } else {
                $chapter = Chapter::where('class_id', $class->id)->where('id', $chapter_id)->first();

                if (!$chapter) {
                    return redirect()->route('studo.index')->with('error', 'Chapter ini tidak ditemukan!');
                }

                $url = $chapter->url;

                // Mengambil query string dari URL
                $queryString = parse_url($url, PHP_URL_QUERY);

                // Memecah query string menjadi array
                parse_str($queryString, $params);

                // Mendapatkan video ID dari parameter 'v'
                $videoId = isset($params['v']) ? $params['v'] : '';

                // if (empty($videoId)) {
                //     return redirect()->route('studo.index')->with('error', 'Video tidak valid');
                // }

                $embedUrl = "https://www.youtube.com/embed/{$videoId}";

                // Cek apakah chapter log sudah ada
                $existingChapterLog = ChapterLog::where('user_id', auth()->user()->id)
                ->where('chapter_id', $chapter_id)
                ->first();

                // Jika belum ada, buat entri baru
                if (!$existingChapterLog) {
                    ChapterLog::create([
                        'user_id' => auth()->user()->id,
                        'chapter_id' => $chapter_id,
                        'status' => "completed",
                    ]);
                }

                // Forum
                $list_forum = Forum::join('classes', 'classes.id', '=', 'forum.class_id')
                ->join('users', 'users.id', '=', 'forum.user_id')
                ->select([
                    'forum.*',
                    'users.name as name',
                ])
                ->where('class_id', $class->id)->get();

                $reply_forum = ReplyForum::join('forum', 'forum.id', '=', 'reply_forum.forum_id')
                ->join('users', 'users.id', '=', 'reply_forum.user_id')
                ->select([
                    'reply_forum.*',
                    'users.name as name',
                ])
                ->where('class_id', $class->id)
                ->get();

                // Leaderboards
                $list_leaderboard = Leaderboard::join('classes', 'classes.id', '=', 'leaderboard.class_id')
                ->join('users', 'users.id', '=', 'leaderboard.user_id')
                ->join('chapters', 'chapters.id', '=', 'classes.chapter_id')
                ->select([
                    'leaderboard.*',
                    'users.name as name',
                ])
                ->where('class_id', $class->id)->get();

            }
        }else{
            $subscription = null;
            $project = null;
            $check_pretest = null;
            $check_posttest = null;
            $chapter = null;
            $embedUrl = null;
            $list_forum = null;
            $reply_forum = null;
            $user = null;
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
        ->join('classes', 'classes.id', '=', 'chapters.class_id')
        ->where('chapter_log.user_id', auth()->user()->id)
        ->where('classes.id', '=', $class->id)
        ->get();

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
            'chapter' => $chapter,
            'embedUrl' => $embedUrl,
            'list_forum' => $list_forum,
            'reply_forum' => $reply_forum,
            'user' => $user,
        ]);

    }

    public function postProject(Request $request, $slug, $chapter_id = null)
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


        $quiz_completion = ProjectLog::updateOrCreate([
            'class_id'       => $class->id,
            'user_id'       => Auth()->user()->id,
            'photo'     => $request->photo,
        ]);

        return redirect()->route('studo.overview', ['slug' => $slug, 'chapter_id' => $chapter_id])->with('success', 'Project berhasil diinput');

    }

    public function postForum(Request $request,$slug, $chapter_id = null)
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


        $forum = Forum::updateOrCreate([
            'class_id'       => $class->id,
            'user_id'       => Auth()->user()->id,
            'description'     => $request->description,
        ]);


        return redirect()->route('studo.overview', ['slug' => $slug, 'chapter_id' => $chapter_id])->with('success','Forum behasil diinput');
    }

    public function postReplyForum(Request $request, $slug, $chapter_id = null)
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


        $reply_forum = ReplyForum::updateOrCreate([
            'forum_id'=> $request->forum_id,
            'user_id'       => Auth()->user()->id,
            'description'     => $request->description,
        ]);


        return redirect()->route('studo.overview', ['slug' => $slug, 'chapter_id' => $chapter_id])->with('success', 'Reply behasil diinput');
    }
}
