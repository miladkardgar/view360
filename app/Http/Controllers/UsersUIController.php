<?php

namespace App\Http\Controllers;

use App\About;
use Illuminate\Http\Request;
use \App\Option;
use Illuminate\Support\Facades\App;

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
        return view('users.details.detail'.$page,compact('id'));
    }
    public function submit(){
        return view('users.submit');
    }
    public function preview(){
        return view('users.preview');
    }
}
