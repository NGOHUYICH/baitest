<?php

namespace App\Http\Controllers;

use App\Mail\SendMail;
use App\Models\CRUD_Contact;
use App\Models\User;
use GrahamCampbell\ResultType\Result;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class FormLogin extends Controller
{
    //
    public function Login()
    {
        return view('Login');

    }
    public function Status(Request $request)
    {
        //dd($request->password);        
        $result = Auth::attempt(['email'=>$request->user,'password'=>$request->password]);
       // $result = Auth::attempt(['email'=>'1angoich08@gmail.com','password'=>'456']);
        // $ThemMoi = User::create([
        //     'name' =>'athang lol ',
        //     'email' => '1angoich08@gmail.com',
        //     'password' =>Hash::make('456'),
        // ]);
         //dd($result);
         $status = $request->filled('user');
         if($result==true){
            //echo 'ich';
            return redirect()->route('hienthi',['status'=>$status]);
         }else{
            return back();
         }
    }
    public function GuiMail()
    {
        // $hienthi = CRUD_Contact::find(1);
        // printf($hienthi);
        $Send = [
            'title'=>'Bao cao hang ngay',
            'body' => 'hello a nhe !!! dung cang thang voi chung em'
        ];
        Mail::to('nguyen.bnam.34@gmail.com')->send(new SendMail($Send));
        echo ' thao tac gui mail dang tien hanh';

        // Mail::send('SendMail',$Send,function($mail){
        //         $mail->to('nguyen.bnam.34@gmail.com','Bnam Nguyen');
        //         $mail->from('ngoich08@gmail.com');

        // });
    }
    public function SendMail($title,$body,$toemail){
        $Send = [
            'title'=> $title,
            'body'=> $body
        ];
        Mail::to($toemail)->send(new SendMail($Send));
        return count(Mail::failures());
    }
    public function register()
    {
        return view('Register');
    }
    public function Check_register(Request $request)
    {
        $Check = [
            "username.required" => 'Kh??ng ???????c ????? tr???ng',
            "username.min" => '??t nh???t 8 k?? t???',
            "email.required" => 'Kh??ng ???????c ????? tr???ng',
            "email.email" =>'kh??ng ph???i d???ng Gmail',
            "email.unique" => 'Email ???? t???n t???i',
            "pass.required" =>'Kh??ng ???????c ????? tr???ng',
            "confirm_password.required"=> 'Kh??ng ???????c ????? tr???ng',
            "confirm_password.same"=> 'Kh??ng tr??ng m???t kh???u'

        ];
        $result =  request()->validate([
            'username' => 'required|min:8',
            'email' =>'required|email|unique:users',
            'pass'=>'required',
            'confirm_password'=>'required|same:pass'
        ],$Check);
        $Add_Register = User::create([
            'name' => $result['username'],
            'email' => $result['email'],
            'password' => Hash::make($result['pass']),
        ]);
        $re_SendMail = $this->SendMail('bao cao','thuc hien thao tac gui Mail',$result['email']);
        if(!$re_SendMail)
        {
            return "<script>alert('G???i Mail th??nh c??ng')</script>";
        }
    }
}
