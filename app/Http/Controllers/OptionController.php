<?php

namespace App\Http\Controllers;

use App\Option;
use App\About;
use App\User;
use Illuminate\Http\Request;

class OptionController extends Controller
{
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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Option $option
     * @return \Illuminate\Http\Response
     */
    public function show(Option $option)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Option $option
     * @return \Illuminate\Http\Response
     */
    public function edit(Option $option)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Option $option
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Option $option)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Option $option
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
        $usersList = User::all()->where("status","=","active");

        if (isset($option)) {
            return view('admin.setting.about', compact('option','usersList'));
        } else {
            return view('admin.setting.about');
        }
    }

    public function aboutStore(Request $request)
    {
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
            $option2->text = $request->text;
            $option2->managerStatus = $manager;
            $option2->noticeStatus = $notice;
            $option2->counterStatus = $counter;
            $option2->logosStatus = $logos;
            $option2->save();
        } else {
            $option->textStatus = $status;
            $option->text = $request->text;
            $option->managerStatus = $manager;
            $option->noticeStatus = $notice;
            $option->counterStatus = $counter;
            $option->logosStatus = $logos;
            $option->save();
        }
        return redirect('/admin/setting/about');
    }
}
