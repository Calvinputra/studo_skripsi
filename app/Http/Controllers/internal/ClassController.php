<?php

namespace App\Http\Controllers\internal;

use App\Http\Controllers\Controller;
use App\Models\Classes;
use App\Models\Materi;
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

        $tutor = Tutor::find(auth()->user()->id);


        return view('internal_tutor.pages.inputClass.informasi', [
            'tutor' => $tutor,
        ]);
    }
    public function storeInformasi(Request $request)
    {
        if (!auth()->check()) {
            return redirect()->route('internal_tutor.index')->with('error', 'Harus Login terlebih dahulu');
        }

        $tutor = Tutor::find(auth()->user()->id);

        $validatedData = $request->validate([
            'name' => 'required|unique:classes,name', // menambahkan validasi unik pada field name
            'tutor_id' => 'required',
            'description' => 'required',
            'competency_unit' => 'required',
            'category' => 'required',
            'price' => 'required',
            'status' => 'required',
            'discount' => 'required',
            'duration' => 'required',
            'status' => 'required',
        ], [
            'name.unique' => 'Judul kelas sudah ada, silahkan pilih judul yang berbeda', // pesan kustom
        ]);
        $slug = Str::slug($request->name, '-');
        $class = new Classes;
        $class->name = $request->name;
        $class->tutor_id = $request->tutor_id;
        $class->description = $request->description;
        $class->competency_unit = $request->competency_unit;
        $class->slug = $slug;
        $class->duration = $request->duration ?? '-';
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

        return view('internal_tutor.pages.inputClass.materi', ['tutor' => $tutor])->with('success', 'Kelas berhasil diinput');
    }

    // materi
    public function materi($slug)
    {
        if (!auth()->check()) {
            return redirect()->route('internal_tutor.index')->with('error', 'Harus Login terlebih dahulu');
        }
        $class = Classes::where('slug', '=', $slug)->first();

        $avatar = auth()->user()->avatar;
        $tutor = Tutor::find(auth()->user()->id);

        return view('internal_tutor.pages.inputClass.materi', [
            'avatar' => $avatar,
            'tutor' => $tutor,
            'class' => $class
        ]);
    }
    public function storeMateri(Request $request)
    {
        if (!auth()->check()) {
            return redirect()->route('internal_tutor.index')->with('error', 'Harus Login terlebih dahulu');
        }

        $tutor = Tutor::find(auth()->user()->id);

        // Mendapatkan jumlah materi yang sudah ada untuk kelas ini
        $existingMateris = Materi::where('classes_id', $request->classes_id)->count();

        // Memeriksa apakah sudah ada minimal 5 materi
        if ($existingMateris < 5) {
            return redirect()->back()->with('error', 'Harus ada minimal 5 chapter sebelum dapat men-submit');
        }

        $validatedData = $request->validate([
            'name' => 'required|unique:materis,name',
            'classes_id' => 'required',
            'type' => 'required',
        ], [
            'name.unique' => 'Judul Chapter sudah ada, silahkan pilih judul yang berbeda',
        ]);

        $materi = new Materi;
        $materi->name = $request->name;
        $materi->classes_id = $request->classes_id;
        $materi->description = $request->description ?? '-';
        $materi->link = $request->link ?? '-';
        $materi->reading = $request->reading ?? '-';
        $materi->save();

        return view('internal_tutor.pages.inputClass.project', [
            'tutor' => $tutor,
        ])->with('success', 'Chapter berhasil diinput');
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
