<?php

namespace App\Http\Controllers;

use App\City;
use App\Estate_types;
use App\Files_atributies;
use App\Files_medias;
use App\upload;
use Chumper\Zipper\Facades\Zipper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use \App\Data;
use \App\Doc_type;
use \App\File;
use function PHPSTORM_META\map;

class estatesController extends Controller
{
    //

    public function __construct()
    {
        App::singleton('estates', function () {
            return Data::where('type', '=', 'fileType')->get();
        });
    }

    function list(Request $request)
    {
        $filesList = File::all();

        return view('admin.estates.list', compact('filesList'));
    }

    public function edit(Request $request)
    {
        $req = File::findOrFail($request->id);
        $fileType = Data::findOrFail($req->data_id)->file;
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
        $attr = Files_atributies::where('file_id', '=', $request->id)->get();
        return view('admin.estates.edit.' . $fileType, compact('req', 'transActionTypes', 'ownerShipDocumentTypes', 'usageTypes', 'provinceLists', 'cityType', 'transActionTypesVila', 'possibilitiesVila', 'possibilities', 'floorsCount', 'commercialTypes', 'transactionTypesCommercial', 'parents', 'pictures', 'attr'));
    }

    function setting(Request $request)
    {
        $Attrs[] = Data::where('type', '=', 'possibilitiesVila')->get();
        $Attrs[] = Data::where('type', '=', 'possibilities')->get();
        $path = url('/public/assets/webfonts/fontawsome/metadata/icons.json');
        $json = json_decode(file_get_contents($path), true);
        return view('admin.estates.setting', compact('json','Attrs'));
    }

    function add(Request $request)
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
        return view('admin.estates.files.' . $datas->file, compact('datas', 'provinceLists', 'ownerShipDocumentTypes', 'usageTypes', 'cityType', 'transActionTypes', 'transActionTypesVila', 'possibilitiesVila', 'floorsCount', 'possibilities', 'commercialTypes', 'transactionTypesCommercial', 'parents'));
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

    function store(Request $request)
    {
        dd($request->file('file'));
        die;
        $file = File::create($request->only(['data_id', 'transaction_type', 'area', 'rooms', 'bathroom', 'bedroom', 'parking', 'lat', 'lon', 'city_id',
            'region_id', 'usage_id', 'arena', 'building', 'price', 'areaPrice', 'direction', 'unit', 'ownership_document_status', 'floor',
            'countFloor', 'mortgage', 'rent', 'buildingYear', 'description', 'oldArea', 'yearMortgage', 'dayMortgage', 'floorType',
            'commercialType', 'ownerName', 'ownerPhone', 'address', 'user_id', 'status', 'deleted_at', 'created_at', 'updated_at',
            'title', 'city_type_id', 'parent_id', 'province_id']));
        if ($file->id != "") {
            $upload = '';
            if ($request->hasfile('file')) {
                $uploadFilesId = $this->uploadFile(request(), $file->id,$type='album');
                $uploadFilesId = $uploadFilesId->getData();
                foreach ($uploadFilesId->id as $item => $val) {
                    Files_medias::create(['file_id' => $file->id, 'media_id' => $val,'type'=>"album"]);
                }
            }

            if ($request->hasfile('fileMain')) {
                $uploadFilesId = $this->uploadFile(request(), $file->id,$type='main');
                $uploadFilesId = $uploadFilesId->getData();
                foreach ($uploadFilesId->id as $item => $val) {
                    Files_medias::create(['file_id' => $file->id, 'media_id' => $val,"type"=>"main"]);
                }
            }

            if ($request->hasfile('file3d')) {
                $uploadFilesId = $this->uploadFile(request(), $file->id,$type='3d');
                $uploadFilesId = $uploadFilesId->getData();
                foreach ($uploadFilesId->id as $item => $val) {
                    Files_medias::create(['file_id' => $file->id, 'media_id' => $val,"type"=>"3d"]);
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
        return redirect()->intended('/admin/estate/list');
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

    public function estateList(Request $request)
    {
        $estates = File::all();
        $info = [];
        foreach ($estates as $estate) {
            $img = Files_medias::where('File_id',$estate->id)->where('type','main')->get();
            $imageInfo = upload::find($img)->first();
            $url= $imageInfo['file'];
            $getTitle = Data::where('id', '=', $estate->data_id)->first();
            $info[] = array(
                "id" => $estate->id,
                "title" => $getTitle->title,
                "price" => "50000",
                "category" => $estate->data_id,
                "marker_image" => url($url),
                "url" => $estate->data_id . "/" . $estate->id,
                "address" => $estate->address,
                "latitude" => $estate->lat,
                "longitude" => $estate->lon,
                "ribbon" => "<i class='fa fa-thumbs-up'></i>",
                "area" => $estate->area,
                "bedrooms" => $estate->beadroom,
                "rooms" => 1,
                "f__air_condition" => 1,
                "f__microwave" => 1
            );
        };
        return $info;
    }

    private function uploadFile(Request $request, $fileID,$type)
    {
        if (!Storage::exists('/public/files/' . date("Y"))) {
            Storage::makeDirectory('/public/files/' . date("Y"), 0775, true, true);
        }
        if (!Storage::exists('/public/files/' . date("Y") . "/" . date("m"))) {
            Storage::makeDirectory('/public/files/' . date("Y") . "/" . date("m"), 0775, true, true);
        }
        if (!Storage::exists('/public/files/' . date("Y") . "/" . date("m") . "/" . date("d"))) {
            Storage::makeDirectory('/public/files/' . date("Y") . "/" . date("m") . "/" . date("d"), 0775, true, true);
        }
        if (!Storage::exists('/public/files/' . date("Y") . "/" . date("m") . "/" . date("d") . "/" . $fileID)) {
            Storage::makeDirectory('/public/files/' . date("Y") . "/" . date("m") . "/" . date("d") . "/" . $fileID, 0775, true, true);
        }
        $uploadID = [];
        if($type=='album') {
            if ($request->hasfile('file')) {
                foreach (request()->file as $uploadFile) {
                    $file = $uploadFile;
                    $fileName = $file->getClientOriginalName();
                    $filename = str_replace(" ", "_", $fileName);
                    $filenameTime = time() . "_" . $filename;
                    $mime = $file->getClientMimeType();
                    $size = $file->getSize();

                    $file->storeAs(
                        "files/" . date("Y") . "/" . date("m") . "/" . date("d") . "/" . $fileID . "/", $filenameTime, 'public'
                    );
                    $upload = new upload();
                    $upload->file = "/public/storage/files/" . date("Y") . "/" . date("m") . "/" . date("d") . "/" . $fileID . "/" . $filenameTime;
                    $upload->folder = "/public/storage/files/" . date("Y") . "/" . date("m") . "/" . date("d") . "/" . $fileID;
                    $upload->name = $filename;
                    $upload->mime = $mime;
                    $upload->size = $size;
                    $upload->users()->associate(auth()->user());
                    $upload->save();
                    $uploadID[] = $upload->id;
                }
            }
        }
        if($type=='main') {
            if ($request->hasfile('fileMain')) {
                foreach (request()->fileMain as $uploadFile) {
                    $file = $uploadFile;
                    $fileName = $file->getClientOriginalName();
                    $filename = str_replace(" ", "_", $fileName);
                    $filenameTime = time() . "_" . $filename;
                    $mime = $file->getClientMimeType();
                    $size = $file->getSize();

                    $file->storeAs(
                        "files/" . date("Y") . "/" . date("m") . "/" . date("d") . "/" . $fileID . "/", $filenameTime, 'public'
                    );
                    $upload = new upload();
                    $upload->file = "/public/storage/files/" . date("Y") . "/" . date("m") . "/" . date("d") . "/" . $fileID . "/" . $filenameTime;
                    $upload->folder = "/public/storage/files/" . date("Y") . "/" . date("m") . "/" . date("d") . "/" . $fileID;
                    $upload->name = $filename;
                    $upload->mime = $mime;
                    $upload->size = $size;
                    $upload->users()->associate(auth()->user());
                    $upload->save();
                    $uploadID[] = $upload->id;
                }
            }
        }
        if($type=='3d') {
            if ($request->hasfile('file3d')) {
                foreach (request()->file3d as $uploadFile) {
                    $file = $uploadFile;
                    $fileName = $file->getClientOriginalName();
                    $filename = str_replace(" ", "_", $fileName);
                    $filenameTime = time() . "_" . $filename;
                    $mime = $file->getClientMimeType();
                    $size = $file->getSize();

                    $file->storeAs(
                        "files/" . date("Y") . "/" . date("m") . "/" . date("d") . "/" . $fileID . "/", $filenameTime, 'public'
                    );

                    if($mime=="zip") {
                        $Path = public_path("files/" . date("Y") . "/" . date("m") . "/" . date("d") . "/" . $fileID . "/" . $filenameTime);
                        Zipper::make($Path)->extractTo('Appdividend');
                    }
                    $upload = new upload();
                    $upload->file = "/public/storage/files/" . date("Y") . "/" . date("m") . "/" . date("d") . "/" . $fileID . "/" . $filenameTime;
                    $upload->folder = "/public/storage/files/" . date("Y") . "/" . date("m") . "/" . date("d") . "/" . $fileID;
                    $upload->name = $filename;
                    $upload->mime = $mime;
                    $upload->size = $size;
                    $upload->users()->associate(auth()->user());
                    $upload->save();
                    $uploadID[] = $upload->id;
                }
            }
        }
        return response()->json(['id' => $uploadID]);
    }

    public function storeAttr(Request $request)
    {
        Data::create($request->all());
        return back();
    }
    public function deleteAttr(Request $request)
    {
        Data::find($request->id)->delete();
        return back();
    }
}
