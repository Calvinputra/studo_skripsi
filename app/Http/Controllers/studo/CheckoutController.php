<?php

namespace App\Http\Controllers\studo;

use App\Http\Controllers\Controller;
use App\Models\Classes;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function getUpload()
    {
        return view('studo.pages.checkout.uploadPembayaran');
    }
    public function getCheckout($slug)
    {
        $class = Classes::join('tutors', 'tutors.id', '=', 'classes.tutor_id')
        ->select([
            'classes.*',
            'tutors.name as tutor_name',
            'tutors.email as tutor_email',
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
