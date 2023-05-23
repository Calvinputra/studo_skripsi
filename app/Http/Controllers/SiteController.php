<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function getIndex()
    {
<<<<<<< HEAD
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
=======
        return view('carel.pages.site.index');
    }
    public function getSearch()
    {
        return view('carel.pages.search.index');
    }
    public function getDetail()
    {
        return view('carel.pages.overview.index');
    }
    public function getSetting()
    {
        return view('carel.pages.setting.index');
>>>>>>> c6a89012ea0062a59fdfce8835a50b794862bdbb
    }
}
