<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function getIndex()
    {
        return view('carel.pages.site.index');
    }
    public function getSearch()
    {
        return view('carel.pages.searchPage.index');
    }
    public function getDetail()
    {
        return view('carel.pages.overviewPage.index');
    }
    public function getSetting()
    {
        return view('carel.setting');
    }
}
