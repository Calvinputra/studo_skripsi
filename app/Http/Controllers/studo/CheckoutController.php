<?php

namespace App\Http\Controllers\studo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function getCheckout()
    {
        return view('studo.pages.checkout.index');
    }
}
