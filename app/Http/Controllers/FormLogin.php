<?php

namespace App\Http\Controllers;

use App\Models\CRUD_Contact;
use GrahamCampbell\ResultType\Result;
use Illuminate\Http\Request;

class FormLogin extends Controller
{
    //
    public function Login()
    {
        return view('Login');

    }
    public function Status(Request $request)
    {
        $status = $request->filled('user');
         if($status){
            return redirect()->route('hienthi',["status"=>$status]);
         }else{
            return back();
         }
    }
    public function hienthi()
    {
        $hienthi = CRUD_Contact::find(1);
        printf($hienthi);
    }

}
