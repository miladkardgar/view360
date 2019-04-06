<?php

namespace App\Http\Controllers;

use App\City;
use App\Estate_types;
use App\Files_atributies;
use App\Files_medias;
use App\upload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use \App\Data;
use \App\Doc_type;
use \App\File;
use function PHPSTORM_META\map;

class estatesController extends Controller
{
    //

    function add(Request $request)
    {
        $datas = \App\Data::all()->where('type', '=', 'fileType');
        return view('admin.estates.add', compact('datas'));
    }

    function list(Request $request)
    {
        $filesList = File::all();

        return view('admin.estates.list', compact('filesList'));
    }


    public function edit(Request $request)
    {
        $req = File::findOrFail($request->id);
        $transActionTypes = Data::where('type', '=', 'transactionType')->get();
        $ownerShipDocumentTypes = Data::where('type', '=', 'ownerShipDocumentType')->get();
        $usageTypes = Data::where('type', '=', 'usageType')->get();
        $provinceLists = City::where("status", "=", "active")->where("parent", "=", "0")->get();
        $cityType = Data::where('type', '=', 'cityType')->get();
        $transActionTypesVila = Data::where('type', '=', 'transactionTypeVila')->get();
        $possibilitiesVila = Data::where('type', '=', 'possibilitiesVila')->get();
        $possibilities = Data::where('type', '=', 'possibilities')->get();
        $floorsCount = Data::where('type', '=', 'floorCount')->get();
        $commercialTypes = Data::where('type', '=', 'commercialType')->get();
        $transactionTypesCommercial = Data::where('type', '=', 'transactionTypeCommercial')->get();
        $parents = File::where('data_id', '=', '4')->get();
        $pictures = Files_medias::where('file_id', '=', $request->id)->get();

        return view('admin.estates.edit.land', compact('req', 'transActionTypes', 'ownerShipDocumentTypes', 'usageTypes', 'provinceLists', 'cityType', 'transActionTypesVila', 'possibilitiesVila', 'possibilities', 'floorsCount', 'commercialTypes', 'transactionTypesCommercial', 'parents', 'pictures'));
    }

    function setting(Request $request)
    {
        return view('admin.estates.setting');
    }

    function getInfo(Request $request)
    {

        $datas = Data::findOrFail($request->id);
        $transActionTypes = Data::where('type', '=', 'transactionType')->get();
        $ownerShipDocumentTypes = Data::where('type', '=', 'ownerShipDocumentType')->get();
        $usageTypes = Data::where('type', '=', 'usageType')->get();
        $provinceLists = City::where("status", "=", "active")->where("parent", "=", "0")->get();
        $cityType = Data::where('type', '=', 'cityType')->get();
        $transActionTypesVila = Data::where('type', '=', 'transactionTypeVila')->get();
        $possibilitiesVila = Data::where('type', '=', 'possibilitiesVila')->get();
        $possibilities = Data::where('type', '=', 'possibilities')->get();
        $floorsCount = Data::where('type', '=', 'floorCount')->get();
        $commercialTypes = Data::where('type', '=', 'commercialType')->get();
        $transactionTypesCommercial = Data::where('type', '=', 'transactionTypeCommercial')->get();
        $parents = File::where('data_id', '=', '4')->get();
        $returnHTML = view('admin.estates.ajax.' . $datas->file, compact('datas', 'provinceLists', 'ownerShipDocumentTypes', 'usageTypes', 'cityType', 'transActionTypes', 'transActionTypesVila', 'possibilitiesVila', 'floorsCount', 'possibilities', 'commercialTypes', 'transactionTypesCommercial', 'parents'))->render();
        return $returnHTML;
    }

    function getCityList()
    {
        $datas = City::where("status", "=", "active")->where('parent', "=", "0")->get();
        return $datas;
    }

    function getArea(Request $request)
    {
        $datas = City::where("status", "=", "active")->where('parent', "=", $request->id)->get();
        return $datas;
    }

    function getDocType(Request $request)
    {
        $datas = City::where("status", "=", "active")->where('parent', "=", $request->id)->get();
        return $datas;
    }

    function addFile(Request $request)
    {
        $file = new File();
        if (isset($request->lat) && $request->lat != "") {
            $locationInfo = explode("_", $request->lat);
            if (isset($locationInfo[0])) {
                $file->lat = $locationInfo[0];
            }
            if (isset($locationInfo[1])) {
                $file->lon = $locationInfo[1];
            }
        }
        if (isset($request->name) && $request->name != "") {
            $file->title = $request->name;
        }
        if (isset($request->data_id) && $request->data_id != "") {
            $file->data_id = $request->data_id;
        }
        if (isset($request->transaction_type) && $request->transaction_type != "") {
            $file->transaction_type = $request->transaction_type;
        }
        if (isset($request->province) && $request->province != "") {
            $file->province_id = $request->province;
        }
        if (isset($request->city_id) && $request->city_id != "") {
            $file->city_id = $request->city_id;
        }
        if (isset($request->region_id) && $request->region_id != "") {
            $file->region_id = $request->region_id;
        }
        if (isset($request->ownership_document_status) && $request->ownership_document_status != "") {
            $file->ownership_document_status = $request->ownership_document_status;
        }
        if (isset($request->usage_id) && $request->usage_id != "") {
            $file->usage_id = $request->usage_id;
        }
        if (isset($request->area) && $request->area != "") {
            $file->area = $request->area;
        }
        if (isset($request->oldArea) && $request->oldArea != "") {
            $file->oldArea = $request->oldArea;
        }
        if (isset($request->bedroom) && $request->bedroom != "") {
            $file->bedroom = $request->bedroom;
        }
        if (isset($request->countFloor) && $request->countFloor != "") {
            $file->countFloor = $request->countFloor;
        }
        if (isset($request->commercialType) && $request->commercialType != "") {
            $file->commercialType = $request->commercialType;
        }
        if (isset($request->parent_id) && $request->parent_id != "") {
            $file->parent_id = $request->parent_id;
        }
        if (isset($request->ownerName) && $request->ownerName != "") {
            $file->ownerName = $request->ownerName;
        }
        if (isset($request->ownerPhone) && $request->ownerPhone != "") {
            $file->ownerPhone = $request->ownerPhone;
        }
        if (isset($request->address) && $request->address != "") {
            $file->address = $request->address;
        }
        if (isset($request->description) && $request->description != "") {
            $file->description = $request->description;
        }
        if (isset($request->cityType) && $request->cityType != "") {
            $file->city_type_id = $request->cityType;
        }
        $file->save();
        if ($file->id != "") {
            if (!Storage::exists('/public/files/' . $file->id)) {
                Storage::makeDirectory('/public/files/' . $file->id, 0775, true, true);
            }
            if ($request->hasfile('file')) {
                foreach ($request->file('file') as $fileUp) {
                    $uploadedFile = $fileUp;
                    $filename = $uploadedFile->getClientOriginalName();
                    $filename = str_replace(" ", "_", $filename);
                    $filenameTime = time() . "_" . $filename;
                    $mime = $uploadedFile->getClientMimeType();
                    $size = $uploadedFile->getSize();

                    $uploadedFile->storeAs(
                        "files/" . $file->id,  $filenameTime,'public'
                    );
                    $upload = new upload();
                    $upload->file = "/public/storage/files/" . $file->id ."/". $filenameTime;
                    $upload->folder = "/public/storage/files/" . $file->id;
                    $upload->name = $filename;
                    $upload->mime = $mime;
                    $upload->size = $size;
                    $upload->users()->associate(auth()->user());
                    $upload->save();

                    $filesMedia = new Files_medias();
                    $filesMedia->file_id = $file->id;
                    $filesMedia->media_id = $upload->id;
                    $filesMedia->save();
                }
            }
            $req = $request->all();
            foreach ($req as $item => $val) {
                if (strpos($item, "possibilities_") !== false) {
                    $pos = new Files_atributies();
                    $pos->data_id = $val;
                    $pos->file_id = $file->id;
                    $pos->type = "possibilities";
                    $pos->save();
                }
            }
        }
        return back();
    }

    private function validateRequest()
    {

        return tap(request()->validate([
            'ownerName' => 'required|min:3'
        ]), function () {
            if (request()->hasFile('file')) {
                request()->validate([
                    'file.*' => 'file|image',
                ]);
            }
        });

    }

    private function storeImage($file)
    {
    }


}
