<?php

namespace App\Http\Controllers\studo;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index()
    {
        return view('studo.pages.search.index');

    }
}
