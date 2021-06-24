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
       // dd(Auth::attempt(['name'=>$request->user,'password'=>$request->password]));
      // dd(Auth::attempt(['email'=>'ngoich08@gmail.com','password'=>'123']));
        // $ThemMoi = User::create([
        //     'name' =>'athang lol ',
        //     'email' => '1angoich08@gmail.com',
        //     'password' =>Hash::make('á456'),
        // ]);
        $status = $request->filled('user');
         if($status){
            return redirect()->route('hienthi',["status"=>$status]);
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
        echo ' thao tac gui mail dang tien hang';



    }

}
