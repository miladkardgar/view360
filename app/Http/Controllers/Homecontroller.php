<?php

namespace App\Http\Controllers;

use App\Data;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class Homecontroller extends Controller
{

    public function __construct()
    {
        App::singleton('estates', function(){
            return Data::where('type','=','fileType')->get();
        });
    }
    public function dashboard(Request $request)
    {
        return view('admin.dashboard.dashboard_page');
    }

}
