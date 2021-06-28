<?php

namespace App\Http\Controllers;

use App\Http\Requests\check_form_login;
use Illuminate\Http\Request;
use App\Models\User;
use GrahamCampbell\ResultType\Result;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class NgohuyIch extends Controller
{
    public function indexAdidas()
    {
        return view('indexAdidas');
    }
    public function Login(Request $request)
    {
        $CheckLogin = Auth::attempt(['name' => $request->username, 'password' => $request->password]);
        if ($CheckLogin) {
            // $listUser = User::all()->chunk(3)->toArray();
            // $listUser = User::all()->pluck('name')->toArray();
            // dd($listUser);
            $listUser = User::all();
            return view('List_User', ['listUser' => $listUser]);
        } else {
            return redirect()->back();
        }
        //return 'xin chao moi nguoi den voi login';

    }
    public function Signup()
    {
        return view('signupAdidas');
    }
    public function Check_Add_User($request)
    {
        $data = new User();
        $data->name = $request->last_name . ' ' . $request->first_name;
        $data->email = $request->email;
        $data->password = Hash::make($request->password);
        return $data;
    }
    public function Check_Signup(check_form_login $check_form_login)
    {
        $data = $this->Check_Add_User($check_form_login);
        // $data = new User();
        // $data->name = $check_form_login->last_name.' '.$check_form_login->first_name;
        // $data->email = $check_form_login->email;
        // $data->password = Hash::make($check_form_login->password);
        if ($data->save()) {
            return "<script> alert('Cập nhật thành công')</script>";
        } else {
            return "<script> alert('Chưa thêm được dữ liệu')</script>";
        }
        // $data->save();
        //return dd($data);
    }
    public function Add_AccountUser(Request $request)
    {
        dd($request);
        // $data = $this->Check_Add_User($request);
        // if ($data->save()) {
        //     return "<script> alert('Cập nhật thành công')</script>";
        // } else {
        //     return "<script> alert('Chưa thêm được dữ liệu')</script>";
        // }
    }
    public function Edit_AccountUser(Request $request)
    {
        $data = User::find($request->Edit_Account);
        $Name = trim($data->name);
        $First_Name_Edit_Account = Str::before($Name, ' ');
        $Last_Name_Edit_Account = Str::after($Name, ' ');
        $Last_Name_Edit_Account = Str::replace(' ','_',$Last_Name_Edit_Account);
        //dd($Last_Name_Edit_Account);
        $Email_Edit_Account = $data->email;
        $listUser = User::all();
        return view(
            'List_User',
            [
                'listUser' => $listUser,
                'First_Name_Edit_Account' => $First_Name_Edit_Account,
                'Last_Name_Edit_Account' =>$Last_Name_Edit_Account,
                'Email_Edit_Account' =>$Email_Edit_Account
            ]
        );
    }
}
