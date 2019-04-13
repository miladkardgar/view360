<?php

namespace App\Http\Controllers;

use App\About;
use App\Data;
use App\File;
use App\Files_atributies;
use App\Files_medias;
use App\User;
use Illuminate\Http\Request;
use \App\Option;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class UsersUIController extends Controller
{
    //

    public function __construct()
    {
        App::singleton('site_settings', function(){
            return Option::find(1);
        });
    }

    public function index()
    {
        $contact = new Option();
        $contact = $contact->find(1);

        return view('users.index',compact('contact'));
    }
    public function about(){
        $about = new About();
        $datas = $about->find(1);
        return view('users.about',compact('datas'));
    }

    public function contact(){
        $contact = new Option();
        $contact = $contact->find(1);
        return view('users.contact',compact('contact'));
    }

    public function login(){
        return view('users.login');
    }
    public function register(){
        return view('users.register');
    }
    public function detail($page,$id){
        $data = Data::findOrFail($page);
        $fileInfos = File::findOrFail($id);
        $medias = Files_medias::where('file_id',$id)->where('type','album')->get();
        $medias3d = Files_medias::where('file_id',$id)->where('type','3d')->get();
        $mediasMain = Files_medias::where('file_id',$id)->where('type','main')->get();
        $attrs = Files_atributies::where('file_id',$id)->get();
        $parents = File::where('parent_id',$id)->get();
        return view('users.details.'.$data->file,compact('fileInfos','data','medias','medias3d','mediasMain','attrs','parents'));
    }
    public function submit(){
        return view('users.submit');
    }
    public function preview(){
        return view('users.preview');
    }

    public function logout(Request $request) {
        Auth::logout();
        return redirect('');
    }

    public function authenticate(Request $request)
    {
        $email = Request("username");
        $password = Request("password");
        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            return redirect()->intended('/');
        } else {
            return redirect()->back()->withErrors(['نام کاربری یا کلمه عبور اشتباه می باشد.']);
        }
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:100',
            'family' => 'required|max:100',
            'email' => 'required|email|unique:users,email',
            'mobile' => 'required|numeric',
            'password' => 'required|min:6|max:100',
        ]);

        User::create(request($validatedData));
        return redirect('register');
    }

}
