<?php

namespace App\Http\Controllers\internal;

use App\Http\Controllers\Controller;
use App\Models\Classes;
use App\Models\Tutor;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class TutorController extends Controller
{
    public function index()
    {
        if(!auth()->check()){
            return redirect()->route('internal_tutor.index')->with('error','Harus Login terlebih dahulu');
        }
        $tutor = Tutor::find(auth()->user()->id);
        $avatar = auth()->user()->avatar;
        
        $classes = Classes::where('tutor_id', $tutor->id)->get();
        $count_classes = Classes::where('tutor_id', '=', $tutor->id)->count();

        return view('internal_tutor.pages.index', [
            'tutor' => $tutor,
            'classes' => $classes,
            'count_classes' => $count_classes
        ]);
    }
    
    public function profile()
    {
        if(!auth()->check()){
            return redirect()->route('internal_tutor.index')->with('error','Harus Login terlebih dahulu');
        }
        $tutor = Tutor::find(auth()->user()->id);
        $avatar = auth()->user()->avatar;

        return view('internal_tutor.pages.profileTutor', [
            'tutor' => $tutor,
            'avatar' => $avatar
        ]);
    }
    public function updateProfile(Request $request, $id){
        $request->validate([
            'name' => 'nullable',
            'phone_number' => 'nullable',
        ]);

        $tutor = Tutor::find(auth()->user()->id);

        $tutor->name = $request->name ? $request->name : null;
        $tutor->phone_number = $request->phone_number ? $request->phone_number : null;
        $tutor->save();

        return back()->with('success', 'Biodata berhasil diperbaharui');
    }

    public function updatePassword(Request $request)
    {
        // Validasi input
        $request->validate([
            'password_lama' => 'required',
            'password_baru' => 'required|min:8',
            'konfirmasi_password' => 'required|same:password_baru',
        ]);
    
        // Mendapatkan user yang sedang login
        $tutor = Tutor::find(auth()->user()->id);
    
        // Memeriksa apakah password lama sesuai dengan yang ada di database
        if (Hash::check($request->password_lama, $tutor->password)) {
            // Memperbarui password baru
            $tutor->password = Hash::make($request->password_baru);
            $tutor->save();
    
            return back()->with('success', 'Password berhasil diperbarui');
        } else {
            return back()->with('error', 'Password lama tidak sesuai');
        }
    }
}
