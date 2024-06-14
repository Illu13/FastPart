<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function aboutUs()
    {
        return view('layouts.aboutus');
    }
    public function cookies()
    {
        return view('layouts.cookies');
    }
}
