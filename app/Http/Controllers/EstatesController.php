<?php

namespace App\Http\Controllers;

use App\City;
use App\Estate_types;
use Illuminate\Http\Request;
use Illuminate\View\View;
use \App\Data;
use \App\Doc_type;
use function PHPSTORM_META\map;

class estatesController extends Controller
{
    //

    function add(Request $request)
    {
        $datas = \App\Data::all();
        return view('admin.estates.add', compact('datas'));
    }

    function list(Request $request)
    {
        return view('admin.estates.list');
    }

    function setting(Request $request)
    {
        return view('admin.estates.setting');
    }

    function getInfo(Request $request)
    {
        $datas = Data::findOrFail($request->id);
        $cityList = City::all()->where("status","=","active")->where("parent","=","0");
        $docTypes =Doc_type::all()->where("status","=","active");
        $estateTypes = Estate_types::all()->where("status","=","active");
        $returnHTML = view('admin.estates.ajax.' . $datas->file,compact('cityList','docTypes','estateTypes'))->render();
        return $returnHTML;
    }

    function getCityList()
    {
        $datas = City::all()->where("status", "=", "active")->where('parent', "=", "0");
        return $datas;
    }

    function getArea(Request $request)
    {
        $datas = City::all()->where("status", "=", "active")->where('parent', "=", $request->id);
        return $datas;
    }

    function getDocType(Request $request)
    {
        $datas = City::all()->where("status", "=", "active")->where('parent', "=", $request->id);
        return $datas;
    }

}
