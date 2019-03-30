<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Homecontroller extends Controller
{
    public function dashboard(Request $request)
    {
        return view('admin.dashboard.dashboard_page');
    }

}
