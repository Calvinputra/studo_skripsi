<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function getCheckout()
    {
        return view('carel.pages.checkout.index');
    }
}
