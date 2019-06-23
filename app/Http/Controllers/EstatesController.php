<?php

namespace App\Http\Controllers;

use App\City;
use App\Estate_types;
use App\Files_atributies;
use App\Files_medias;
use App\subdomain;
use App\upload;
use App\User;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use \App\Data;
use \App\Doc_type;
use \App\File;
use ZanySoft\Zip\Zip;
use function PHPSTORM_META\map;

class estatesController extends Controller
{
    //

    use SoftDeletes;

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

    function subdomains(Request $request)
    {
        $subs = subdomain::all();
        $users = User::all();
        return view('admin.estates.subdomains', compact('subs', 'users'));
    }

    function subdomainsStore(Request $request, subdomain $subdomain)
    {
        $data = $request->validate([
            'title' => 'required|min:2|max:100',
            'user_id' => 'required',
        ]);
        $data['c_id'] = Auth::id();
        subdomain::create($data);
        return back()->with(['result' => "success", 'message' => 'ساب دامین اضافه گردید.']);

    }

    function setting(Request $request)
    {
        $Attrs[] = Data::where('type', '=', 'possibilitiesVila')->get();
        $Attrs[] = Data::where('type', '=', 'possibilities')->get();
        $path = url('/public/assets/webfonts/fontawsome/metadata/icons.json');
        $json = json_decode(file_get_contents($path), true);
        $provinces = City::all();
        $fileTypes = Data::where("type", "fileType")->get();
        return view('admin.estates.setting', compact('json', 'Attrs', 'provinces', 'fileTypes'));
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
        $subs = subdomain::all();
        return view('admin.estates.files.' . $datas->file, compact('datas', 'provinceLists', 'ownerShipDocumentTypes', 'usageTypes', 'cityType', 'transActionTypes', 'transActionTypesVila', 'possibilitiesVila', 'floorsCount', 'possibilities', 'commercialTypes', 'transactionTypesCommercial', 'parents', 'subs'));
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

        if ($this->validateRequest($request)) {
            $check = false;
            $checkSFW = false;
            $checkXML = false;

            if ($request->hasfile('file3d')) {
                foreach (request()->file3d as $uploadFile) {
                    $mime = $uploadFile->getClientMimeType();
//                    dd($mime);
                    $zipType = ['application/x-zip-compressed', 'application/zip'];
                    if (in_array($mime, $zipType)) {
//                        dd($request->all());
                        $zip = Zip::open($uploadFile);
                        $listFiles = $zip->listFiles();

                        foreach ($listFiles as $listFile) {
                            if (strpos($listFile, "tour.swf") !== false) {
                                $checkSFW = true;
                                echo 1;
                            }
                            if (strpos($listFile, "tour.xml") !== false) {
                                $checkXML = true;
                                echo 2;
                            }
                        }
                    }

                }
            } else {
                $check = true;
            }
            if ($checkSFW == true && $checkXML == true) {
                $check = true;
            }
            if ($check == true) {
                $file = File::create($request->only(['data_id', 'transaction_type', 'area', 'rooms', 'bathroom', 'bedroom', 'parking', 'lat', 'lon', 'city_id',
                    'region_id', 'usage_id', 'arena', 'building', 'price', 'areaPrice', 'direction', 'unit', 'ownership_document_status', 'floor',
                    'countFloor', 'mortgage', 'rent', 'buildingYear', 'description', 'oldArea', 'yearMortgage', 'dayMortgage', 'floorType',
                    'commercialType', 'ownerName', 'ownerPhone', 'address', 'user_id', 'status', 'deleted_at', 'created_at', 'updated_at',
                    'title', 'city_type_id', 'parent_id', 'province_id', 'sub_domain']));
                if ($file->id != "") {
                    $upload = '';
                    if ($request->hasfile('file')) {
                        $uploadFilesId = $this->uploadFile(request(), $file->id, $type = 'album');
                        $uploadFilesId = $uploadFilesId->getData();
                        foreach ($uploadFilesId->id as $item => $val) {
                            Files_medias::create(['file_id' => $file->id, 'media_id' => $val, 'type' => "album"]);
                        }
                    }

                    if ($request->hasfile('fileMain')) {
                        $uploadFilesId = $this->uploadFile(request(), $file->id, $type = 'main');
                        $uploadFilesId = $uploadFilesId->getData();
                        foreach ($uploadFilesId->id as $item => $val) {
                            Files_medias::create(['file_id' => $file->id, 'media_id' => $val, "type" => "main"]);
                        }
                    }

                    if ($request->hasfile('file3d')) {
                        $uploadFilesId = $this->uploadFile(request(), $file->id, $type = '3d');
                        $uploadFilesId = $uploadFilesId->getData();
                        foreach ($uploadFilesId->id as $item => $val) {
                            Files_medias::create(['file_id' => $file->id, 'media_id' => $val, "type" => "3d"]);
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
            } else {
                return back()->withErrors('فایل سه بعدی ارسالی ناقص میباشد.');
            }
        }
    }

    private function validateRequest(Request $request)
    {

        return tap(request()->validate([
//            'ownerPhone' => 'iran_mobile',
            'ownerName' => 'min:0|max:200',
            'address' => 'address|min:0|max:255',
            'lat' => 'required',
            'lon' => 'required',
        ]), function () {
            if (request()->hasFile('file3d')) {
                request()->validate([
                    'file3d.*' => 'file|mimes:zip',
                ]);
            }
            if (request()->hasFile('fileMain')) {
                request()->validate([
                    'fileMain.*' => 'file|image',
                ]);
            }
            if (request()->hasFile('file')) {
                request()->validate([
                    'file.*' => 'file|image',
                ]);
            }
        });

    }

    public function estateList(Request $request)
    {
        $estates = File::where('status', 'active')->get();
        $info = [];
        foreach ($estates as $estate) {
            $img = Files_medias::where('File_id', $estate->id)->where('type', 'main')->get();
            $imageInfo = upload::find($img)->first();
            $dataInfo = Data::where("id", $estate->data_id)->get()->first();
            if ($dataInfo['upload_id'] != 0 && $dataInfo['upload_id'] != "") {
                $image = $dataInfo->fileInfo->file;
            } else {
                $image = '/public/assets/img/icon-pin.png';
            }
            $url = $imageInfo['file'];
            $getTitle = Data::where('id', '=', $estate->data_id)->first();
            $info[] = array(
                "id" => $estate->id,
                "title" => $getTitle->title,
                "fileType" => $estate->data_id,
                "province_id" => $estate->province_id,
                "city_id" => $estate->city_id,
                "region_id" => $estate->region_id,
                "price" => "50000",
                "category" => $estate->data_id,
                "marker_image" => url($image),
                "marker_image2" => url($url),
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

    private function uploadFile(Request $request, $fileID, $type)
    {
        if (!Storage::exists('/public/files/' . date("Y"))) {
            Storage::makeDirectory('/public/files/' . date("Y"), 775, true, true);
        }
        if (!Storage::exists('/public/files/' . date("Y") . "/" . date("m"))) {
            Storage::makeDirectory('/public/files/' . date("Y") . "/" . date("m"), 775, true, true);
        }
        if (!Storage::exists('/public/files/' . date("Y") . "/" . date("m") . "/" . date("d"))) {
            Storage::makeDirectory('/public/files/' . date("Y") . "/" . date("m") . "/" . date("d"), 775, true, true);
        }
        if (!Storage::exists('/public/files/' . date("Y") . "/" . date("m") . "/" . date("d") . "/" . $fileID)) {
            Storage::makeDirectory('/public/files/' . date("Y") . "/" . date("m") . "/" . date("d") . "/" . $fileID, 775, true, true);
        }
        if (!Storage::exists('/public/files/' . date("Y") . "/" . date("m") . "/" . date("d") . "/" . $fileID . "/zip")) {
            Storage::makeDirectory('/public/files/' . date("Y") . "/" . date("m") . "/" . date("d") . "/" . $fileID . "/zip", 775, true, true);
        }
        $uploadID = [];
        if ($type == 'album') {
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
                    $upload->file = "storage/app/public/files/" . date("Y") . "/" . date("m") . "/" . date("d") . "/" . $fileID . "/" . $filenameTime;
                    $upload->folder = "storage/app/public/files/" . date("Y") . "/" . date("m") . "/" . date("d") . "/" . $fileID;
                    $upload->name = $filename;
                    $upload->mime = $mime;
                    $upload->size = $size;
                    $upload->users()->associate(auth()->user());
                    $upload->save();
                    $uploadID[] = $upload->id;
                }
            }
        }
        if ($type == 'main') {
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
                    $upload->file = "storage/app/public/files/" . date("Y") . "/" . date("m") . "/" . date("d") . "/" . $fileID . "/" . $filenameTime;
                    $upload->folder = "storage/app/public/files/" . date("Y") . "/" . date("m") . "/" . date("d") . "/" . $fileID;
                    $upload->name = $filename;
                    $upload->mime = $mime;
                    $upload->size = $size;
                    $upload->users()->associate(auth()->user());
                    $upload->save();
                    $uploadID[] = $upload->id;
                }
            }
        }
        if ($type == '3d') {
            if ($request->hasfile('file3d')) {
                foreach (request()->file3d as $uploadFile) {
                    $file = $uploadFile;
                    $fileName = $file->getClientOriginalName();
                    $filename = str_replace(" ", "_", $fileName);
                    $filenameTime = time() . "_" . $filename;
                    $mime = $file->getClientMimeType();
                    $size = $file->getSize();

                    $zip = Zip::open($uploadFile);
                    $zip->extract("storage/app/public/files/" . date("Y") . "/" . date("m") . "/" . date("d") . "/" . $fileID . "/zip");
                    $file->storeAs(
                        "files/" . date("Y") . "/" . date("m") . "/" . date("d") . "/" . $fileID . "/", $filenameTime, 'public'
                    );

                    $upload = new upload();
                    $upload->file = "storage/app/public/files/" . date("Y") . "/" . date("m") . "/" . date("d") . "/" . $fileID . "/" . $filenameTime;
                    $upload->folder = "storage/app/public/files/" . date("Y") . "/" . date("m") . "/" . date("d") . "/" . $fileID;
                    $upload->name = $filename;
                    $upload->mime = $mime;
                    $upload->size = $size;
                    $upload->users()->associate(auth()->user());
                    $upload->save();
                    $uploadID[] = $upload->id;

                    $upload = new upload();
                    $upload->file = "storage/app/public/files/" . date("Y") . "/" . date("m") . "/" . date("d") . "/" . $fileID . "/zip/tour.swf";
                    $upload->folder = "storage/app/public/files/" . date("Y") . "/" . date("m") . "/" . date("d") . "/" . $fileID . "/zip";
                    $upload->name = "tour.swf";
                    $upload->mime = "swf";
                    $upload->size = "1";
                    $upload->users()->associate(auth()->user());
                    $upload->save();
                    $uploadID[] = $upload->id;

                    $upload = new upload();
                    $upload->file = "storage/app/public/files/" . date("Y") . "/" . date("m") . "/" . date("d") . "/" . $fileID . "/zip/tour.xml";
                    $upload->folder = "storage/app/public/files/" . date("Y") . "/" . date("m") . "/" . date("d") . "/" . $fileID . "/zip";
                    $upload->name = "tour.xml";
                    $upload->mime = "xml";
                    $upload->size = "1";
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

    public function getCityListSetting()
    {
        $provinces = City::where('parent', '0')->get();
        $list = array();
        $temp = array();
        foreach ($provinces as $province => $val) {
            $getCites = City::where('parent', $val->id)->get();
//            $temp[$val->id]=array();
            foreach ($getCites as $getCite => $name) {
                if ($name->name != "") {
                    $list[] = [
                        "name" => $name->name,
                        "id" => $name->id,
                        "province" => $val->name];
                }
            }
            $temp[$val->id] = $list;
        }
        return $temp;
    }

    public function changeStatus(Request $request, File $file)
    {
        if ($file->where('id', $request->id)->update(['status' => $request->val])) {
            return back()->with(['result' => "success", "message" => "فایل مورد نظر " . $request->val . " گردید."]);
        } else {
            return back()->with(['result' => "error", "message" => "فایل مورد نظر یافت نشد!"]);
        }
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
        $albums = Files_medias::where('file_id', '=', $request->id)->where('type', 'album')->get();
        $images = Files_medias::where('file_id', '=', $request->id)->where('type', '3d')->get();
        $mains = Files_medias::where('file_id', '=', $request->id)->where('type', 'main')->get();
        $attrs = Files_atributies::where('file_id', '=', $request->id)->get();
        $subs = subdomain::all();
        return view('admin.estates.edit.' . $req->data->file, compact('req', 'transActionTypes', 'ownerShipDocumentTypes', 'usageTypes', 'provinceLists', 'cityType', 'transActionTypesVila', 'possibilitiesVila', 'possibilities', 'floorsCount', 'commercialTypes', 'transactionTypesCommercial', 'parents', 'albums', 'mains', 'images', 'attrs', 'subs'));
    }

    public function deleteImage(Request $request, Files_medias $files_medias)
    {
        if ($files_medias->where('media_id', $request->id)->count() > 0) {
            $files_medias->where('media_id', $request->id)->delete();
            return back()->with(["result" => "success", "message" => "تصویر مورد نظر حذف گردید."]);
        }
        return back()->with(["result" => "error", "message" => "تصویر مورد نظر در سیستم یافت نشد."]);
    }

    public function update(Request $request, File $file)
    {
        if ($this->validateRequest($request)) {
            $check = false;
            $checkSFW = false;
            $checkXML = false;
            if ($request->hasfile('file3d')) {
                foreach (request()->file3d as $uploadFile) {
                    $mime = $uploadFile->getClientMimeType();
                    $zipType = ['application/x-zip-compressed', 'application/zip'];
                    if (in_array($mime, $zipType)) {
                        $zip = Zip::open($uploadFile);
                        $listFiles = $zip->listFiles();
                        foreach ($listFiles as $listFile) {
                            if (strpos($listFile, "tour.swf") !== false) {
                                $checkSFW = true;
                            }
                            if (strpos($listFile, "tour.xml") !== false) {
                                $checkXML = true;
                            }
                        }
                    }
                }
            } else {
                $check = true;
            }
            if ($checkSFW == true && $checkXML == true) {
                $check = true;
            }
            if ($check == true) {
                $file->update($request->only(['data_id', 'transaction_type', 'area', 'rooms', 'bathroom', 'bedroom', 'parking', 'lat', 'lon', 'city_id',
                    'region_id', 'usage_id', 'arena', 'building', 'price', 'areaPrice', 'direction', 'unit', 'ownership_document_status', 'floor',
                    'countFloor', 'mortgage', 'rent', 'buildingYear', 'description', 'oldArea', 'yearMortgage', 'dayMortgage', 'floorType',
                    'commercialType', 'ownerName', 'ownerPhone', 'address', 'user_id', 'status', 'deleted_at', 'created_at', 'updated_at',
                    'title', 'city_type_id', 'parent_id', 'province_id', 'sub_domain']));

                if ($request->hasfile('file')) {
                    $uploadFilesId = $this->uploadFile(request(), $request->id, $type = 'album');
                    $uploadFilesId = $uploadFilesId->getData();
                    foreach ($uploadFilesId->id as $item => $val) {
                        Files_medias::create(['file_id' => $request->id, 'media_id' => $val, 'type' => "album"]);
                    }
                }

                if ($request->hasfile('fileMain')) {
                    Files_medias::where('type', 'main')->where('file_id', $request->id)->delete();
                    $uploadFilesId = $this->uploadFile(request(), $request->id, $type = 'main');
                    $uploadFilesId = $uploadFilesId->getData();
                    foreach ($uploadFilesId->id as $item => $val) {
                        Files_medias::create(['file_id' => $request->id, 'media_id' => $val, "type" => "main"]);
                    }
                }

                if ($request->hasfile('file3d')) {
                    Files_medias::where('type', '3d')->where('file_id', $request->id)->delete();
                    $uploadFilesId = $this->uploadFile(request(), $request->id, $type = '3d');
                    $uploadFilesId = $uploadFilesId->getData();
                    foreach ($uploadFilesId->id as $item => $val) {
                        Files_medias::create(['file_id' => $request->id, 'media_id' => $val, "type" => "3d"]);
                    }
                }

                $attrs = Files_atributies::where('file_id', $request->id)->get('data_id');
                $req = $request->all();
                $checkAttrs = array();
                foreach ($req as $item => $val) {
                    if (strpos($item, "possibilities_") !== false) {
                        $check = Files_atributies::where('data_id', $val)->where('file_id', $request->id)->first();
                        if (!$check) {
                            $pos = new Files_atributies();
                            $pos->data_id = $val;
                            $pos->file_id = $request->id;
                            $pos->type = "possibilities";
                            $pos->save();
                        }
                        array_push($checkAttrs, $val);

                    }
                }
                $attrs2 = array();
                foreach ($attrs as $data => $val) {
                    array_push($attrs2, $val->data_id);
                }
                $diff = array_diff($attrs2, $checkAttrs);
                foreach ($diff as $item) {
                    Files_atributies::where('data_id', $item)->where('file_id', $request->id)->delete();
                }
                return back()->with(["result" => "success", "message" => "اطلاعات شما با موفقیت ویرایش شد."]);
            } else {
                return back()->withErrors('فایل سه بعدی ارسالی ناقص میباشد.');
            }
        } else {
            return back()->with(["result" => "error", "message" => "خطا در پارامتر های ارسالی"]);
        }
    }

    public function changeStatusCites(Request $request, City $city)
    {
        $city->where('id', $request->id)->update(['status' => $request->val]);
        $city->where('parent', $request->id)->update(['status' => $request->val]);
        return back()->with(['result' => 'success', 'message' => 'تغییر وضعیت شهر مورد نظر اعمال شد.']);
    }

    public function addCity(Request $request)
    {
        $res = '
<form action="/admin/estate/setting/city/addCity/store/' . $request->id . '" method="post">' . csrf_field() . '
        <div class="row">
            <div class="col-12 col-md-12">
                <div class="form-group">
                    <input type="hidden" name="parent" value="' . $request->id . '">
                    <label for="selectRole">نام شهر را وارد نمایید</label>
                    <input type="text" name="name" class="form-control">
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-link" data-dismiss="modal">انصراف</button>
            <button type="submit" class="btn bg-primary">افزودن</button>
        </div>
    </form>';
        return $res;
    }

    public function addStore(Request $request, City $city)
    {

        $data = $request->validate([
            'name' => 'required|min:2|max:100',
            'parent' => 'required',
        ]);
        City::create($data);
        return back()->with(['result' => "success", 'message' => 'شهر مورد نظر به سیستم اضافه گردید.']);
    }

    function fileTypeSetting(Request $request)
    {
        $req = $request->all();
        foreach ($req as $item => $val) {
            if (strpos($item, "file_") !== false) {
                $idFile = trim(str_replace("file_", "", $item));
                if ($request->hasfile($item)) {
                    if (!Storage::exists('/public/files/fileTypes')) {
                        Storage::makeDirectory('/public/files/fileTypes', 775, true, true);
                    }
                    foreach (request()->$item as $uploadFile) {
                        $file = $uploadFile;
                        $fileName = $file->getClientOriginalName();
                        $filename = str_replace(" ", "_", $fileName);
                        $filenameTime = time() . "_" . $filename;
                        $mime = $file->getClientMimeType();
                        $size = $file->getSize();
                        $file->storeAs(
                            "files/fileTypes", $filenameTime, 'public');
                        $upload = new upload();
                        $upload->file = "storage/app/public/files/fileTypes/" . $filenameTime;
                        $upload->folder = "storage/app/public/files/fileTypes/";
                        $upload->name = $filename;
                        $upload->mime = $mime;
                        $upload->size = $size;
                        $upload->users()->associate(auth()->user());
                        $upload->save();
                        $uploadID = $upload->id;
                        Data::where('id', $idFile)->update(['upload_id' => $uploadID]);
                    }
                }
            }
        }
        return back()->with(['result' => "success", 'message' => 'تغییرات فایل ها انجام پذیرفت.']);

    }
}
