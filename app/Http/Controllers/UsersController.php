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
        App::singleton('estates', function () {
            return Data::where('type', '=', 'fileType')->get();
        });
    }

    public function addUser(Request $request)
    {
        return view('admin.users.addUser');
    }

    public function usersList(Request $request,User $user)
    {
        $usersList = $user->orderBy('id','asc')->get();
        return view('admin.users.list', compact('usersList'));
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

    public function store(Request $request, User $user)
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

    public function changeStatus(Request $request, User $user)
    {
        if (User::findOrFail($request->id)) {
            $user->where('id', $request->id)->update(['status' => $request->val]);
            return back()->with(['result' => 'success', 'message' => 'کاربر مورد نظر با موفقیت ' . $request->val . " شد."]);
        }
        return back()->with(['result' => 'error', 'message' => 'کاربر مورد نظر یافت نشد.']);
    }

    public function changeRole(Request $request)
    {
        $roles = Role::all();
        $roleUser = Request('role');
        $res = '
        <form action="/admin/users/list/changeRole/update" method="post">
                        ' . csrf_field() . '
                        
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
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-link" data-dismiss="modal">انصراف</button>
            <button type="submit" class="btn bg-primary">ذخیره تغییرات</button>
        </div>
    </form>';
        return $res;
    }


    public function changePassword(Request $request)
    {
        $res = '
<form action="/admin/users/list/changePassword/update/' . $request->id . '" method="post">' . csrf_field() . '
        <div class="row">
            <div class="col-12 col-md-12">
                <div class="form-group">
                    <label for="selectRole">کلمه عبور جدید را وارد نمایید.</label>
                    <input type="password" name="password" class="form-control">
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-link" data-dismiss="modal">انصراف</button>
            <button type="submit" class="btn bg-primary">ذخیره تغییرات</button>
        </div>
    </form>';
        return $res;
    }

    public function changePasswordUpdate(Request $request, User $user)
    {
        if ($user->findOrFail($request->id)) {
            $user->where('id', $request->id)->update(['password' => bcrypt($request->password)]);
            return back()->with(['result' => 'success', "message" => 'کلمه عبور کاربر با موفقیت تغییر یافت.']);
        } else {
            return back()->with(['result' => 'error', "message" => 'کاربر یافت نشد!']);
        }
    }


    public function changeInfo(Request $request)
    {
        $userInfo = User::findOrFail($request->id);
        $res = '
<form action="/admin/users/list/changeInfo/update/' . $request->id . '" method="post">' . csrf_field() . '
        <div class="row">
            <div class="col-12 col-md-12">
                <div class="form-group">
                    <label for="name">نام</label>
                    <input type="text" name="name" id="name" required class="form-control" value="'.$userInfo->name.'">
                </div>
            </div>
            <div class="col-12 col-md-12">
                <div class="form-group">
                    <label for="family">نام خانوادگی</label>
                    <input type="text" name="family" id="family" required class="form-control" value="'.$userInfo->family.'">
                </div>
            </div>
            
            <div class="col-12 col-md-12">
                <div class="form-group">
                    <label for="mobile">موبایل</label>
                    <input type="number" name="mobile" id="mobile" required class="form-control" value="'.$userInfo->mobile.'">
                </div>
            </div>
            
            <div class="col-12 col-md-12">
                <div class="form-group">
                    <label for="naCode">کد ملی</label>
                    <input type="number" name="naCode" id="naCode" required class="form-control" value="'.$userInfo->naCode.'">
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-link" data-dismiss="modal">انصراف</button>
            <button type="submit" class="btn bg-primary">ذخیره تغییرات</button>
        </div>
    </form>';
        return $res;
    }

    public function changeInfoUpdate(Request $request,User $user)
    {
        if($user->where('id',$request->id)->count()>0) {
            $user->where('id', $request->id)->update(['name' => $request->name, "family" => $request->family, "mobile" => $request->mobile, "naCode" => $request->naCode]);
            return back()->with(['result' => "success", "message" => "اطلاعات کاربر با موفقیت ویرایش گردید."]);
        }else{
            return back()->with(['result' => "error", "message" => "کاربر یافت نشد!"]);

        }
    }

    function update(Request $request)
    {
        $users = new User();
        $userInfo = $users->findOrFail(Request('userID'));
        $userInfo->role_id = Request('selectRole');
        $userInfo->save();
        return redirect()->intended('/admin/users/list');
    }
}
