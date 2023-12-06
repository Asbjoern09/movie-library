<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class AdminController extends Controller
{
    public function show(): View
    {
        return view('adminPage');
    }
}
