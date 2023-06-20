<?php

namespace App\Http\Controllers\studo;

use App\Http\Controllers\Controller;
use App\Models\Classes;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function getUpload($slug)
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
        return view('studo.pages.checkout.uploadPembayaran',[
            'class' => $class,
        ]);
    }

    public function PostUpload($slug)
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
        return view('studo.pages.checkout.uploadPembayaran', [
            'class' => $class,
        ]);
    }

    public function getCheckout($slug)
    {
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
        ]);
    }
}
