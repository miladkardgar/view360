<?php

namespace App\Http\Controllers;

use App\file_contact;
use Illuminate\Http\Request;

class FileContactController extends Controller
{
    //

    public function store(Request $request)
    {
        file_contact::create($this->validateFile($request));
        return back()->with(['result' => "success", 'message' => "درخواست شما با موفقیت ارسال شد."]);
    }

    private function validateFile(Request $request)
    {
        return $request->validate([
            'name' => 'required|min:3',
            'email' => 'email',
            'phone' => 'required|numeric',
            'message' => 'required|min:5',
            'file_id' => ''
        ]);
    }
}
