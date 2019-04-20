<?php

namespace App\Http\Controllers;

use App\Data;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    //
    public function __construct()
    {
        App::singleton('estates', function(){
            return Data::where('type','=','fileType')->get();
        });
    }

    public function addUser(Request $request)
    {
        return view('admin.users.addUser');
    }

    public function usersList(Request $request)
    {
        $usersList = User::all();
        $roles = Role::all();
        return view('admin.users.list', compact('usersList', 'roles'));
    }

    public function usersPermissions(Request $request)
    {
        return view('admin.users.permissions');
    }

    public function usersSetting(Request $request)
    {
        return view('admin.users.setting');
    }

    public function login(Request $request)
    {
        return view('admin.users.login');
    }

    public function store(Request $request,User $user)
    {

        $register = $request->validate([
            'name' => 'required|max:100',
            'family' => 'required|max:100',
            'email' => 'required|email|unique:users,email',
            'mobile' => 'required|iran_mobile',
            'password' => 'required|min:6|max:100|confirmed',
        ]);
        $register['password'] = bcrypt($request->password);
        $user->create($register);
        return redirect('/admin/');
    }

    public function authenticate(Request $request)
    {
        $email = Request("username");
        $password = Request("password");
        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            return redirect()->intended('/admin/');
        } else {
            return redirect()->intended('/admin/login');
        }
    }


    public function passwordRecovery()
    {
        return view("admin.users.password-recovery");
    }

    public function changeStatus(Request $request)
    {
        $users = new User();
        $id = Request('id');
        $status = Request('val');
        $usersInfo = User::find($id);
        if (isset($usersInfo)) {
            $usersInfo->status = $status;
            $usersInfo->save();
        }
        $res = array("result" => "success");
        return json_encode($res);
    }

    public function changeRole(Request $request)
    {
        $roles = Role::all();
        $roleUser = Request('role');
        $res = '
<input type="hidden" value="' . Request('id') . '" name="userID">
        <div class="row">
            <div class="col-12 col-md-4">
                <div class="form-group">
                    <label for="selectRole">نقش را انتخاب نمایید.</label>
                    <select name="selectRole" id="selectRole" class="form-control">
                        <option value="">انتخاب نمایید.</option>';
        foreach ($roles as $role) {
            $check = '';
            if ($role->id == $roleUser) {
                $check = 'selected';
            }
            $res .= '<option ' . $check . ' value="' . $role->id . '">' . $role->title . '</option>';
        }
        $res .= '
                    </select>
                </div>
            </div>
        </div>';
        return $res;
    }

    function update(Request $request)
    {
        $users = new User();
        $userInfo = $users->find(Request('userID'));
        $userInfo->role_id = Request('selectRole');
        $userInfo->save();
        return redirect()->intended('/admin/users/list');
    }
}
