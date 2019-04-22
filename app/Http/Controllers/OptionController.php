<?php

namespace App\Http\Controllers;

use App\Data;
use App\file_contact;
use App\Option;
use App\About;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class OptionController extends Controller
{

    public function __construct()
    {
        App::singleton('estates', function () {
            return Data::where('type', '=', 'fileType')->get();
        });
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

    }

    /**
     * Display the specified resource.
     *
     * @param \App\Option $option
     * @return \Illuminate\Http\Response
     */
    public function show(Option $option)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Option $option
     * @return \Illuminate\Http\Response
     */
    public function edit(Option $option)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Option $option
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Option $option)
    {
        //
        $data = $request->validate(
            [
                "site_title" => 'required',
                "site_description" => 'required',
                "site_email" => 'nullable|email',
                "site_email2" => 'nullable|email',
                "site_tel" => 'nullable',
                "site_tel2" => 'nullable',
                "site_mobile" => 'nullable|iran_mobile',
                "site_mobile2" => 'nullable|iran_mobile',
                "site_url" => '',
                "site_fax" => '',
                "site_instagram" => '',
                "site_telegram" => '',
                "site_twitter" => '',
                "site_facebook" => '',
                "site_address" => '',
                "site_address2" => '',
                "site_lat" => '',
                "site_lon" => '',
            ]
        );
        $option->update($data);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Option $option
     * @return \Illuminate\Http\Response
     */
    public function destroy(Option $option)
    {
        //
    }

    public function about()
    {
        $option = new About();
        $option = $option->find(1);
        $usersList = User::all()->where("status", "=", "active");

        if (isset($option)) {
            return view('admin.setting.about', compact('option', 'usersList'));
        } else {
            return view('admin.setting.about');
        }
    }

    public function aboutStore(Request $request)
    {


        function dataready($data)
        {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        $option = new About();
        $option2 = $option->find(1);
        $status = 0;
        $manager = 0;
        $counter = 0;
        $notice = 0;
        $logos = 0;
        if (isset($request->textStatus) && $request->textStatus == "on") {
            $status = 1;
        }
        if (isset($request->managerStatus) && $request->managerStatus == "on") {
            $manager = 1;
        }
        if (isset($request->noticeStatus) && $request->noticeStatus == "on") {
            $notice = 1;
        }
        if (isset($request->counterStatus) && $request->counterStatus == "on") {
            $counter = 1;
        }
        if (isset($request->logosStatus) && $request->logosStatus == "on") {
            $logos = 1;
        }
        if (isset($option2)) {
            $option2->textStatus = $status;
            $option2->text = dataready($request->text);
            $option2->managerStatus = $manager;
            $option2->noticeStatus = $notice;
            $option2->counterStatus = $counter;
            $option2->logosStatus = $logos;
            $option2->save();
        } else {
            $option->textStatus = $status;
            $option->text = dataready($request->text);
            $option->managerStatus = $manager;
            $option->noticeStatus = $notice;
            $option->counterStatus = $counter;
            $option->logosStatus = $logos;
            $option->save();
        }

        return redirect('/admin/setting/about');
    }

    public function contact()
    {
        $contacts = file_contact::all();
        return view('admin.setting.contact', compact('contacts'));
    }

    public function setting()
    {
        $info = Option::find(1);
        return view('admin.setting.setting', compact('info'));
    }

    public function contactView(Request $request)
    {
        $conInfo = file_contact::find($request->id)->first();
        if (isset($conInfo->id)) {
            file_contact::where('id', $request->id)->update(['read_status'=> '1']);
        }
        return view('admin.setting.contactView', compact('conInfo'));
    }

    public function uploadImage(Request $request) {
        $CKEditor = $request->input('CKEditor');
        $funcNum  = $request->input('CKEditorFuncNum');
        $message  = $url = '';
        if (Input::hasFile('upload')) {
            $file = Input::file('upload');
            if ($file->isValid()) {
                $filename =rand(1000,9999).$file->getClientOriginalName();
                $file->move(public_path().'/wysiwyg/', $filename);
                $url = url('wysiwyg/' . $filename);
            } else {
                $message = 'An error occurred while uploading the file.';
            }
        } else {
            $message = 'No file uploaded.';
        }
        return '<script>window.parent.CKEDITOR.tools.callFunction('.$funcNum.', "'.$url.'", "'.$message.'")</script>';
    }
}
