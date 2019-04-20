<?php

namespace App\Http\Controllers;

use App\Data;
use App\upload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{
    //
    protected $guarded = [];

    public function __construct()
    {
        App::singleton('estates', function () {
            return Data::where('type', '=', 'fileType')->get();
        });
    }

    public function uploadDeleted(Request $request)
    {
        return $request;
    }

}
