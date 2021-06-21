<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CRUD_Contact;
use Session;

class FormDangNhap extends Controller
{
    //
    public function HienthiFormLogin(Request $request)
    {
        $ThongBaoLoi = [
            'name.required' => 'Tiêu đề bắt buộc',
            'name.min'=>'Ký tự quá ngắn'
        ];
        if(isset($_POST['send'])){
            request()->validate([
                'name'=> 'required|min:8'
            ],$ThongBaoLoi);
            echo request()->name;
            $post = new CRUD_Contact();
            $post->name = request()->name;
            $post->address = request()->address;
            $post->email = request()->email;
            $post->content = request()->content;
            $post->save();
           // Session::flash('succes','Thêm mới thành công');
            //return view('Ouput_Login');
        }else{
            return view('Input_Login');
        }
    }   
}
