<?php

namespace App\Http\Controllers\studo;

use App\Http\Controllers\Controller;
use App\Models\Classes;
use App\Models\Subscription;
use App\Models\User;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function getUpload( $slug)
    {
        $user = User::find(auth()->user()->id);
        $class = Classes::join('users', 'users.id', '=', 'classes.user_id')
        ->select([
            'classes.*',
            'users.name as tutor_name',
            'users.email as tutor_email',
        ])->where('slug', $slug)->where('status', 'active')->first();

        if (!$class) {
            return redirect()->route('studo.index')->with('error', 'Kelas ini tidak ditemukan !');
        }
        return view('studo.pages.checkout.uploadPembayaran',[
            'class' => $class,
            'user' => $user,
        ]);
    }

    public function PostUpload(Request $request, $slug)
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
        $validatedData = $request->validate([
            'photo' => 'required|image',
        ]);

        $subscription = new Subscription;
        $subscription->class_id = $request->class_id;
        $subscription->user_id = $request->user_id;
        $subscription->status = $request->status;

        // Mengunggah dan menyimpan foto
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $photoPath = $photo->store('photos'); // Menyimpan foto ke direktori 'storage/app/photos'
            $subscription->photo = $photoPath;
        }

        $subscription->save();

        return redirect()->route('studo.index')->with('success', 'Bukti Transfer sudah terkirim !');
    }

    public function getCheckout($slug)
    {
        $user = User::find(auth()->user()->id);
        $class = Classes::join('users', 'users.id', '=', 'classes.user_id')
        ->select([
            'classes.*',
            'users.name as tutor_name',
            'users.email as tutor_email',
        ])->where('slug', $slug)->where('status', 'active')->first();

        if(!$class)
        {
            return redirect()->route('studo.index')->with('error', 'Kelas ini tidak ditemukan !');
        }

        return view('studo.pages.checkout.index', [
            'class' => $class,
            'user' => $user,
        ]);
    }
}
