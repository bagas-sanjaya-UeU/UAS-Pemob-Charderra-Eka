<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    /**
     * Display the dashboard index page.
     */
    public function index()
    {
        return view('dashboard.index');
    }
}