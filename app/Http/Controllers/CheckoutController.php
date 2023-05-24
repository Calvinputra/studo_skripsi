<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function getCheckout()
    {
        return view('studo.pages.checkout.index');
    }
}
