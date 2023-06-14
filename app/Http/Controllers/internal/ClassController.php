<?php

namespace App\Http\Controllers\internal;

use App\Http\Controllers\Controller;
use App\Models\Chapter;
use App\Models\Classes;
use App\Models\Materi;
use App\Models\Tutor;
use Illuminate\Http\Request;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

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
        $edit = Classes::where('slug', $slug)->first();

        if ($edit->tutor_id != auth()->user()->id) {
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

        // if ($class->tutor_id != auth()->user()->id) {
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
        return redirect()->route('internal_tutor.class.materi', ['slug' => $request->slug ])->with('success', 'Kelas berhasil diinput');
    }

    public function updateInformasi(Request $request, $slug)
    {
        if (!auth()->check()) {
            return redirect()->route('internal_tutor.index')->with('error', 'Harus Login terlebih dahulu');
        }

        $tutor = Tutor::find(auth()->user()->id);
        $classes = Classes::where('slug', $slug)->first();

        if ($classes->tutor_id != auth()->user()->id) {
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
        return redirect()->route('internal_tutor.class.materi', ['slug' => $slug])->with('success', 'Kelas berhasil di Edit');
    }
    // materi
    public function materi($slug)
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

        $tutor = Tutor::find(auth()->user()->id);

        return view('internal_tutor.pages.inputClass.materi', [
            'slug' => $slug, 
            'class' => $class,
            'chapters' => $chapters,
            'count_video' => $count_video,
            'count_reading' => $count_reading
            ])->with('success', 'Kelas berhasil diinput');
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

        $tutor = Tutor::find(auth()->user()->id);

        return view('internal_tutor.pages.inputClass.quest', [
            'slug' => $slug, 
            'class' => $class,
            'chapters' => $chapters,
            'count_video' => $count_video,
            'count_reading' => $count_reading
            ])->with('success', 'Kelas berhasil diinput');
    }
    public function storeMateri(Request $request,  $slug)
    {
        if (!auth()->check()) {
            return redirect()->route('internal_tutor.index')->with('error', 'Harus Login terlebih dahulu');
        }
        $class = Classes::where('slug', $slug)->first();

        if ($class->tutor_id != auth()->user()->id) {
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
        $chapter->save();

        return redirect()->route('internal_tutor.class.materi', ['slug' => $request->slug])->with('success', 'Chapters berhasil diinput');
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
