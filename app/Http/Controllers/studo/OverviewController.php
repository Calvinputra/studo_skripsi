<?php

namespace App\Http\Controllers\studo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OverviewController extends Controller
{
    public function index()
    {
        return view('studo.pages.overview.index');

    }
}
