<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function getIndex()
    {
        return view('carel.index');
    }
    public function getSearch()
    {
        return view('carel.search');
    }
    public function getDetail()
    {
        return view('carel.overview');
    }
}
