<?php

namespace App\Http\Controllers;

use App\Http\Requests\check_form_login;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class NgohuyIch extends Controller
{
    public function indexAdidas()
    {
        return view('indexAdidas');
    }
    public function Login(Request $request)
    {
        $CheckLogin = Auth::attempt(['name'=>$request->username,'password'=>$request->password]);
        if($CheckLogin)
        {
            return view('List_User');
        }else
        {
            return redirect()->back();
        } 
        //return 'xin chao moi nguoi den voi login';

    }
    public function Signup()
    {
        return view('signupAdidas');
    }
    public function Check_Signup(check_form_login $check_form_login)
    {
        $data = new User();
        $data->name = $check_form_login->last_name.' '.$check_form_login->first_name;
        $data->email = $check_form_login->email;
        $data->password = Hash::make($check_form_login->password);
        if($data->save()){
            return "<script> alert('Cập nhật thành công')</script>";
        }else
        {
            return "<script> alert('Chưa thêm được dữ liệu')</script>";
        }
       // $data->save();
        //return dd($data);

    }
}
