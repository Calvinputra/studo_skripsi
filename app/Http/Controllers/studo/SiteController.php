<?php

namespace App\Http\Controllers\studo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;


class SiteController extends Controller
{
    public function index()
    {

        return view('studo.pages.site.index', [
        ]);
    }
}
