<?php

namespace App\Http\Controllers;

use App\About;
use App\City;
use App\Data;
use App\File;
use App\file_contact;
use App\Files_atributies;
use App\Files_medias;
use App\upload;
use App\User;
use Illuminate\Http\Request;
use \App\Option;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use ZanySoft\Zip\Zip;

class UsersUIController extends Controller
{
    //

    public function __construct()
    {
        App::singleton('site_settings', function () {
            return Option::find(1);
        });
    }

    public function index()
    {
        $contact = new Option();
        $contact = $contact->find(1);
        $fileTypes = Data::fileTypes()->get();
        $transactionTypes = Data::transactionTypes()->get();
        $usageTypes = Data::usageTypes()->get();
        $cityTypes = Data::cityTypes()->get();
        $provinces = City::where('parent', 0)->get();
        $attrs = Data::where('type', 'possibilities')->get();
        return view('users.index', compact('contact', 'fileTypes', 'transactionTypes', 'usageTypes', 'cityTypes', 'provinces', 'attrs'));
    }
    public function index2()
    {
        $contact = new Option();
        $contact = $contact->find(1);
        $fileTypes = Data::fileTypes()->get();
        $transactionTypes = Data::transactionTypes()->get();
        $usageTypes = Data::usageTypes()->get();
        $cityTypes = Data::cityTypes()->get();
        $provinces = City::where('parent', 0)->get();
        $attrs = Data::where('type', 'possibilities')->get();
        return view('users.index2', compact('contact', 'fileTypes', 'transactionTypes', 'usageTypes', 'cityTypes', 'provinces', 'attrs'));
    }

    public function about()
    {
        $about = new About();
        $datas = $about->find(1);
        return view('users.about', compact('datas'));
    }

    public function contact()
    {
        $contact = new Option();
        $contact = $contact->find(1);
        return view('users.contact', compact('contact'));
    }

    public function login()
    {
        return view('users.login');
    }

    public function register()
    {
        return view('users.register');
    }

    public function detail($page, $id)
    {
        if (File::where('id', $id)->where('status', 'active')->count() > 0) {
            $data = Data::findOrFail($page);
            $fileInfos = File::findOrFail($id);
            $medias = Files_medias::where('file_id', $id)->where('type', 'album')->get();
            $medias3d = Files_medias::where('file_id', $id)->where('type', '3d')->get();
            $mediasMain = Files_medias::where('file_id', $id)->where('type', 'main')->get();
            $attrs = Files_atributies::where('file_id', $id)->get();
            $parents = File::where('parent_id', $id)->get();
            return view('users.details.' . $data->file, compact('fileInfos', 'data', 'medias', 'medias3d', 'mediasMain', 'attrs', 'parents'));
        } else {
            return abort(403);
        }
    }

    public function submit()
    {
        return view('users.submit');
    }

    public function preview()
    {
        return view('users.preview');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('');
    }

    public function authenticate(Request $request)
    {
        $email = Request("username");
        $password = Request("password");
        $userStatus = User::where('email', $email)->first();
        if ($userStatus->status === "active") {
            if (Auth::attempt(['email' => $email, 'password' => $password, "status" => 'active'])) {
                return redirect()->intended('/');
            } else {
                return back()->with(['result' => 'error', 'message' => 'نام کاربری یا کلمه عبور اشتباه می باشد.']);
            }
        } else {
            return back()->with(['result' => 'error', 'message' => 'حساب کاربری شما غیر فعال میباشد.']);
        }
    }

    public function profile()
    {
        $userInfo = User::find(Auth::id());
        return view('users.profile', compact('userInfo'));
    }

    public function updateProfile(Request $request, User $user)
    {

        if (Auth::id()) {

            if ($request->password) {
                $data = $request->validate(
                    [
                        "name" => 'required|min:2',
                        "family" => 'required|min:2',
                        "mobile" => 'nullable|iran_mobile',
                        "naCode" => 'nullable|melli_code',
                        'password' => 'min:0|max:100|confirmed',
                    ]
                );
                $data['password'] = bcrypt($request->password);

            } else {
                $data = $request->validate(
                    [
                        "name" => 'required|min:2',
                        "family" => 'required|min:2',
                        "mobile" => 'nullable|iran_mobile',
                        "naCode" => 'nullable|melli_code',
                    ]
                );
            }
            if ($data) {
                if ($request->hasfile('file')) {
                    $uploadFilesId = $this->uploadFile(request(), Auth::id());
                    $data['media_id'] = $uploadFilesId;
                }
                $user->where('id', $request->id)->update($data);
                return back()->with(['result' => 'success', 'message' => 'مشخصات شما با موفقیت ویرایش شد.']);
            } else {
                return back()->with(['result' => 'error', 'message' => 'مشخصات شما با موفقیت ویرایش شد.']);
            }
        }
    }

    public function store(Request $request, User $user)
    {

        $ro = \Request::route()->getName();
        $register = $request->validate([
            'name' => 'required|max:100',
            'family' => 'required|max:100',
            'email' => 'required|email|unique:users,email',
            'mobile' => 'required|numeric',
            'password' => 'required|min:6|max:100|confirmed',
        ]);
        $register['password'] = bcrypt($request->password);
        if ($user->create($register)) {
            $email = Request("email");
            $password = Request("password");
            if ($ro === "panel") {
                return back()->with(["result" => 'success', 'message' => "ثبت نام کاربر با موفقیت انجام پذیرفت."]);
            } else {
                if (Auth::attempt(['email' => $email, 'password' => $password])) {
                    return redirect()->route('index')->with(['result' => 'success', 'message' => 'ثبت نام شما با موفقیت انجام شد.']);
                }
            }

        } else {
            return back();
        };
    }

    public function contactSubmit(Request $request)
    {
        file_contact::create($this->validateFile($request));
        return back()->with(['result' => "success", 'message' => "درخواست شما با موفقیت ارسال شد."]);
    }

    private function validateFile(Request $request)
    {
        return $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'subject' => 'required|min:2',
            'message' => 'required|min:5',
        ]);
    }


    private function uploadFile(Request $request, $userID)
    {
        if (!Storage::exists('/public/files/users-image/')) {
            Storage::makeDirectory('/public/files/users-image/', 775, true, true);
        }
        $uploadID = '';
        if ($request->hasfile('file')) {
            $file = request()->file;
            $fileName = $file->getClientOriginalName();
            $filename = str_replace(" ", "_", $fileName);
            $filenameTime = time() . "_" . $userID . "_" . $filename;
            $mime = $file->getClientMimeType();
            $size = $file->getSize();

            $file->storeAs("files/users-image/", $filenameTime, 'public');
            $upload = new upload();
            $upload->file = "storage/app/public/files/users-image/" . $filenameTime;
            $upload->folder = "storage/app/public/files/users-image";
            $upload->name = $filename;
            $upload->mime = $mime;
            $upload->size = $size;
            $upload->users()->associate(auth()->user());
            $upload->save();
            $uploadID = $upload->id;
        }
        return $uploadID;
    }

}
