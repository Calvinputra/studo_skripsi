<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OverviewController extends Controller
{
    public function index()
    {
        return view('studo.pages.overview.index');

    }
}
