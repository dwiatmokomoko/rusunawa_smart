<?php

namespace App\Http\Controllers\feature\fo\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Home_foController extends Controller
{
    public function index()
    {
        return view('feature.fo.home.index');
    }
}
