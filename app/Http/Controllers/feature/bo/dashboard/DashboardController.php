<?php

namespace App\Http\Controllers\feature\bo\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    private $menu;
    function __construct() {
        $this->menu = "Dashboard";
    }

    function index() {
        $data["menu"] = $this->menu;
        return view('feature.bo.dashboard.index', compact("data"));
    }
}
