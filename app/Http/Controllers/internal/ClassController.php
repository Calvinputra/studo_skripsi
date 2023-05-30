<?php

namespace App\Http\Controllers\internal;

use App\Http\Controllers\Controller;
use App\Models\Classes;
use App\Models\Tutor;
use Illuminate\Http\Request;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Str;

class ClassController extends Controller
{
    public function index()
    {
        if (!auth()->check()) {
            return redirect()->route('internal_tutor.index')->with('error', 'Harus Login terlebih dahulu');
        }

        $avatar = auth()->user()->avatar;
        $tutor = Tutor::find(auth()->user()->id);

        return view('internal_tutor.pages.inputClass.informasi', [
            'avatar' => $avatar,
            'tutor' => $tutor,
        ]);
    }
    public function store(Request $request)
    {
        if (!auth()->check()) {
            return redirect()->route('internal_tutor.index')->with('error', 'Harus Login terlebih dahulu');
        }
        $request->validate([
            'name' => 'required',
            'tutor_id' => 'required',
            'description' => 'required',
            'competency_unit' => 'required',
            // 'slug' => 'required',
            // 'thumbnail' => 'required|image|mimes:png,jpg,jpeg,webp',
            'category' => 'required',
            // 'duration' => 'required',
            'price' => 'required',
            // 'status' => 'required',
            'discount' => 'required',
        ]);

        try {
            DB::transaction(function() use($request) {
                $class = new Classes;
                $class->name = $request->name;
                $class->tutor_id = $request->tutor_id;
                $class->description = $request->description;
                $class->competency_unit = $request->competency_unit;
                $class->slug = Str::slug($request->name, '-');
                $class->duration = $request->duration ?? 0;
                $class->category = $request->category;
                $class->price = $request->price ?? 0;
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
        });

        return view('internal_tutor.pages.inputClass.informasi')->with('success', 'Kelas berhasil diinput');

        }catch(Exception $e) {
            return back()->with('error','internal server error!');
        }
    }

    // materi
    public function materi()
    {
        if (!auth()->check()) {
            return redirect()->route('internal_tutor.index')->with('error', 'Harus Login terlebih dahulu');
        }

        $avatar = auth()->user()->avatar;
        $tutor = Tutor::find(auth()->user()->id);

        return view('internal_tutor.pages.inputClass.materi', [
            'avatar' => $avatar,
            'tutor' => $tutor,
        ]);
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
