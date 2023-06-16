<?php

namespace App\Http\Controllers\internal;

use App\Http\Controllers\Controller;
use App\Imports\QuestQuestionImport;
use App\Models\Chapter;
use App\Models\Classes;
use App\Models\Materi;
use App\Models\Project;
use App\Models\Quest;
use App\Models\Tutor;
use Illuminate\Http\Request;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;

class ClassController extends Controller
{
    public function index($slug = null)
    {
        if (!auth()->check()) {
            return redirect()->route('internal_tutor.index')->with('error', 'Harus Login terlebih dahulu');
        }

        $tutor = Tutor::find(auth()->user()->id);

        $edit = null;

        return view('internal_tutor.pages.inputClass.informasi', [
            'tutor' => $tutor,
            'slug' => $slug,
            'edit' => $edit
        ]);
    }
    public function edit($slug)
    {
        if (!auth()->check()) {
            return redirect()->route('internal_tutor.index')->with('error', 'Harus Login terlebih dahulu');
        }
        $edit = Classes::where('slug', $slug)->where('tutor_id', auth()->user()->id)->first();

        if (!$edit) {
            return redirect()->route('internal_tutor.index')->with('error', 'Kamu tidak pernah membuat kelas ini');
        }
        $tutor = Tutor::find(auth()->user()->id);

        $total_duration = Chapter::where('class_id', $edit->id)
        ->sum('duration');

        return view('internal_tutor.pages.inputClass.informasi', [
            'tutor' => $tutor,
            'slug' => $slug,
            'edit' => $edit,
            'total_duration' => $total_duration
        ]);
    }
    public function storeInformasi(Request $request)
    {
        
        if (!auth()->check()) {
            return redirect()->route('internal_tutor.index')->with('error', 'Harus Login terlebih dahulu');
        }
        
        $tutor = Tutor::find(auth()->user()->id);
        // $class = Classes::where('slug', $request->slug)->first();
        
        // if (!$class) {
            //     return redirect()->route('internal_tutor.index')->with('error', 'Kamu tidak pernah membuat kelas ini');
            // }
            
            $validatedData = $request->validate([
                'name' => 'required|unique:classes,name', // menambahkan validasi unik pada field name
                'tutor_id' => 'required',
                'description' => 'required',
                'competency_unit' => 'required',
                'category' => 'required',
                'price' => 'required',
                'status' => 'required',
                'discount' => 'required',
                'status' => 'required',
            ], [
                'name.unique' => 'Judul kelas sudah ada, silahkan pilih judul yang berbeda', // pesan kustom
            ]);
        // $slug = Str::slug($request->name, '-');
        $class = new Classes;
        $class->name = $request->name;
        $class->tutor_id = $request->tutor_id;
        $class->description = $request->description;
        $class->competency_unit = $request->competency_unit;
        $class->slug = $request->slug;
        $class->category = $request->category;
        $class->price = $request->price ?? '-';
        $class->discount = $request->discount;
        $class->status = $request->status;
        
        // handle file upload
        if ($request->hasFile('thumbnail')) {
            // get file
            $file = $request->file('thumbnail');
            
            // generate unique name for the file
            $filename = time() . '.' . $file->getClientOriginalExtension();
            
            // save file to public/thumbnails directory
            $path = $file->storeAs('thumbnails', $filename, 'public');
            
            // save file name to database
            $class->thumbnail = $path;
        }
        
        $class->save();
        
        $check_project = Quest::where('class_id', $class->id)->where('tutor_id', $tutor->id)->first();
        if(!$check_project){
            $project = new Quest;
            $project->class_id = $class->id;
            $project->tutor_id = $tutor->id;
            $project->save();
        }
        return redirect()->route('internal_tutor.class.materi', ['slug' => $request->slug ])->with('success', 'Kelas berhasil diinput');
    }

    public function updateInformasi(Request $request, $slug)
    {
        if (!auth()->check()) {
            return redirect()->route('internal_tutor.index')->with('error', 'Harus Login terlebih dahulu');
        }

        $tutor = Tutor::find(auth()->user()->id);
        $classes = Classes::where('slug', $slug)->where('tutor_id', auth()->user()->id)->first();

        if (!$classes) {
            return redirect()->route('internal_tutor.index')->with('error', 'Kamu tidak pernah membuat kelas ini');
        }
        // $slug = Str::slug($request->name, '-');
        $class = Classes::find($classes->id);
        $class->name = $request->name;
        $class->tutor_id = $request->tutor_id;
        $class->description = $request->description;
        $class->competency_unit = $request->competency_unit;
        $class->slug = $request->slug;
        $class->category = $request->category;
        $class->price = $request->price ?? '-';
        $class->discount = $request->discount;
        $class->status = $request->status;

        // handle file upload
        if (!$request->hasFile('thumbnail')) {
            $class['thumbnail'] = $classes->thumbnail;
        }else{
            // get file
            $file = $request->file('thumbnail');

            // generate unique name for the file
            $filename = time() . '.' . $file->getClientOriginalExtension();

            // save file to public/thumbnails directory
            $path = $file->storeAs('thumbnails', $filename, 'public');

            // save file name to database
            $class->thumbnail = $path;
        }

        $class->save();

        $check_project = Quest::where('class_id', $class->id)->where('tutor_id', $tutor->id)->first();
        if (!$check_project) {
            $project = new Quest;
            $project->class_id = $class->id;
            $project->tutor_id = $tutor->id;
            $project->save();
        }
        return redirect()->route('internal_tutor.class.materi', ['slug' => $slug])->with('success', 'Kelas berhasil di Edit');
    }
    // materi
    public function materi($slug)
    {
        if (!auth()->check()) {
            return redirect()->route('internal_tutor.index')->with('error', 'Harus Login terlebih dahulu');
        }

        $class = Classes::where('slug', $slug)->where('tutor_id', auth()->user()->id)->first();
        
        if(!$class){
            return redirect()->route('internal_tutor.index')->with('error', 'Kamu tidak pernah membuat kelas ini');
        }
        
        $chapters = Chapter::where('class_id', $class->id)->orderBy('priority', 'ASC')->get();
        $count_video = Chapter::where('type', 'video')->where('class_id', $class->id)->count();
        $count_reading = Chapter::where('type', 'reading')->where('class_id', $class->id)->count();
        $count_chapter = Chapter::where('class_id', $class->id)->count();
        
        $tutor = Tutor::find(auth()->user()->id);

        return view('internal_tutor.pages.inputClass.materi', [
            'slug' => $slug, 
            'class' => $class,
            'chapters' => $chapters,
            'count_video' => $count_video,
            'count_reading' => $count_reading,
            'count_chapter' => $count_chapter
            ])->with('success', 'Kelas berhasil diinput');
    }
    public function storeMateri(Request $request,  $slug)
    {
        if (!auth()->check()) {
            return redirect()->route('internal_tutor.index')->with('error', 'Harus Login terlebih dahulu');
        }
        $class = Classes::where('slug', $slug)->where('tutor_id', auth()->user()->id)->first();

        if (!$class) {
            return redirect()->route('internal_tutor.index')->with('error', 'Kamu tidak pernah membuat kelas ini');
        }
        $tutor = Tutor::find(auth()->user()->id);

        $validatedData = $request->validate([
            'name' => 'required',
            'class_id' => 'required',
            'type' => 'required',
        ]);
        // dd($request->all());

        $chapter = new Chapter;
        $chapter->type = $request->type;
        $chapter->name = $request->name;
        $chapter->class_id = $request->class_id;
        $chapter->priority = $request->priority;
        $chapter->description = $request->description ?? '-';
        $chapter->url = $request->url ?? '-';
        $chapter->reading = $request->reading ?? '-';
        $chapter->duration = $request->duration ?? '-';
        $chapter->save();

        return redirect()->route('internal_tutor.class.materi', ['slug' => $request->slug])->with('success', 'Chapters berhasil diinput');
    }

    public function updateMateri(Request $request,$slug, $id)
    {
        if (!auth()->check()) {
            return redirect()->route('internal_tutor.index')->with('error', 'Harus Login terlebih dahulu');
        }
        $class = Classes::where('slug', $slug)->where('tutor_id', auth()->user()->id)->first();

        if (!$class) {
            return redirect()->route('internal_tutor.index')->with('error', 'Kamu tidak pernah membuat kelas ini');
        }
        $tutor = Tutor::find(auth()->user()->id);

        $validatedData = $request->validate([
            'name' => 'required',
            'class_id' => 'required',
            'type' => 'required',
        ]);
        // dd($request->all());

        $updateChapter = Chapter::find($id);
        $updateChapter->type = $request->type;
        $updateChapter->name = $request->name;
        $updateChapter->class_id = $request->class_id;
        $updateChapter->priority = $request->priority;
        $updateChapter->description = $request->description ?? '-';
        $updateChapter->url = $request->url ?? '-';
        $updateChapter->reading = $request->reading ?? '-';
        $updateChapter->duration = $request->duration ?? '-';
        $updateChapter->save();

        return redirect()->route('internal_tutor.class.materi', ['slug' => $request->slug])->with('success', 'Chapters berhasil diedit');
    }

    public function quest($slug)
    {
        if (!auth()->check()) {
            return redirect()->route('internal_tutor.index')->with('error', 'Harus Login terlebih dahulu');
        }

        $class = Classes::where('slug', $slug)->first();
        
        if($class->tutor_id != auth()->user()->id){
            return redirect()->route('internal_tutor.index')->with('error', 'Kamu tidak pernah membuat kelas ini');
        }
        
        $chapters = Chapter::where('class_id', $class->id)->orderBy('priority', 'ASC')->get();
        $count_video = Chapter::where('type', 'video')->where('class_id', $class->id)->count();
        $count_reading = Chapter::where('type', 'reading')->where('class_id', $class->id)->count();

        $quest = Quest::where('class_id', $class->id)->where('tutor_id', auth()->user()->id)->first();
        $check_pretest = Quest::join('quest_question', 'quest_question.quest_id', '=', 'quest.id')
        ->where('class_id', $class->id)
        ->where('tutor_id', auth()->user()->id)
        ->where('quest_type', 'pretest')->first();

        $check_posttest = Quest::join('quest_question', 'quest_question.quest_id', '=', 'quest.id')
        ->where('class_id', $class->id)
        ->where('tutor_id', auth()->user()->id)
        ->where('quest_type', 'posttest')->first();

        $tutor = Tutor::find(auth()->user()->id);

        return view('internal_tutor.pages.inputClass.quest', [
            'slug' => $slug, 
            'class' => $class,
            'chapters' => $chapters,
            'count_video' => $count_video,
            'count_reading' => $count_reading,
            'quest' => $quest,
            'check_pretest' => $check_pretest,
            'check_posttest' => $check_posttest,
            ])->with('success', 'Kelas berhasil diinput');
    }

    public function import_quiz_question(Request $request)
    {
        $this->validate($request, [
            'quest_type' => 'required',
            'quest_id' => 'required',
            'file'      => 'required|mimes:xls,xlsx',
        ]);
        $data = [
            'quest_type' => $request->quest_type,
            'quest_id' => $request->quest_id,
        ];

        $import = new QuestQuestionImport($data);
        try {
            if ($request->file('file')) {
                Excel::import($import, $request->file('file'));
            }
        } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
            // return back()->withFailures($e->failures());
            return back()->with('error', 'Isian File tidak sesuai dengan format yang ditentukan');
        }

        $quest_id = $request->quest_id;

        // return redirect()->route('internal.program_digital_quizzes.show', $program_digital_quiz_id)->with('message','Pertanyaan Quiz sukses di import!');
        return back()->with('message', 'Pertanyaan Quest sukses di import!');
    }

    public function download_template_question_import()
    {
        return response()->download('assets/template-import/quiz_question_template.xlsx');
    }

    // project
    public function project()
    {
        if (!auth()->check()) {
            return redirect()->route('internal_tutor.index')->with('error', 'Harus Login terlebih dahulu');
        }

        $avatar = auth()->user()->avatar;
        $tutor = Tutor::find(auth()->user()->id);

        return view('internal_tutor.pages.inputClass.project', [
            'avatar' => $avatar,
            'tutor' => $tutor,
        ]);
    }
}
