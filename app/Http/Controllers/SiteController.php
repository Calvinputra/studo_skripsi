<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function getIndex()
    {
        return view('studo.pages.site.index');
    }
    public function getSearch()
    {
        return view('studo.pages.searchPage.index');
    }
    public function getDetail()
    {
        return view('studo.pages.overviewPage.index');
    }
    public function getSetting()
    {
        return view('studo.setting');
    }
}
