<?php

namespace App\Http\Controllers;

use App\Http\Requests\check_form_login;
use App\Models\contacts;
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
            // $listUser = User::all();
            //dd(User::get());
            return redirect()->route('Home');
            // return view('List_User', ['listUser' => $listUser]);
        } else {
            return redirect()->back();
        }
        //return 'xin chao moi nguoi den voi login';        
    }
    public function HomeAdidas(Request $request)
    {
        $listUser = User::all();
        // $listContact = User::find('name','');
        // $listContact = User::with('contacts','contacts.name')->get('contacts.name');
        // $listContact = User::first()->contacts;
        $listContact =  User::with('contacts')->get();
    //    dd($listContact[0]['contacts'][0]['phone']);
        //$listName = pluck($listContact);
       // echo $listContact[0]['name']
       // dd($listContact[0]['contacts']);
       // echo '<pre>';
       // print_r($listContact);die;
        return view('List_User', ['listUser' => $listUser, 'request' => $request,'listContact'=>$listContact]);
        // dd($listUser);
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
        // $data = new Uer();s
        // $data->name = $check_form_login->last_name.' '.$check_form_login->first_name;
        // $data->email = $check_form_login->email;
        // $data->password = Hash::make($check_form_login->password);
        if ($data->save()) {
            $Phone = $check_form_login->phone;
            $CheckID = User::all()->last();
            $CheckID = $CheckID->id;
            $dataContact = new contacts();
            $dataContact->Phone = $Phone;
            $dataContact->User_id = $CheckID;
            $dataContact->save();
           // echo "<script> alert('Cập nhật thành công')</script>";
            return redirect()->route('Home');
        } else {
            return "<script> alert('Chưa thêm được dữ liệu')</script>";
        }
        // $data->save();
        //return dd($data);
    }
    public function Add_AccountUser(Request $request)
    {
        //dd($request);
        $data = $this->Check_Add_User($request);
        if ($data->save()) {
            //echo "<script> alert('Thêm mới thành công')</script>";
            return redirect()->route('Home');
        } else {
            return "<script> alert('Chưa thêm được dữ liệu')</script>";
        }
    }
    public function Edit_AccountUser(Request $request)
    {
        $data = User::find($request->Edit_Account);
        $Name = trim($data->name);
        $First_Name_Edit_Account = Str::before($Name, ' ');
        $Last_Name_Edit_Account = Str::after($Name, ' ');
        // $Last_Name_Edit_Account = Str::replace(' ','_',$Last_Name_Edit_Account);
        //dd($Last_Name_Edit_Account);
        $Email_Edit_Account = $data->email;
        $listUser = User::all();
        $status = 1;
        // $listUser = $listUser->toArray();
        // dd($listUser[0]['id']);
        return view(
            'List_User',
            [
                'status' => $status,
                'request' => $request,
                'listUser' => $listUser,
                'First_Name_Edit_Account' => $First_Name_Edit_Account,
                'Last_Name_Edit_Account' => $Last_Name_Edit_Account,
                'Email_Edit_Account' => $Email_Edit_Account
            ]
        );
    }
    public function Perform_Edit_AccountUser(Request $request)
    {
        $data = User::where('id', '=', $request->Edit_Account)
            ->Update([
                'name' => $request->last_name . ' ' . $request->first_name,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);
        if ($data) {
            //echo "<script> alert('Cập nhật thành công')</script>";
            return redirect()->route('Home');
        } else
            return "<script> alert('Thất bại cập nhật')</script>";
    }
    public function Delete_AccountUser($Delete_Account)
    {
        $data = User::where('id', '=', $Delete_Account)
            ->delete();
        if ($data) {
            //echo "<script> alert('Xóa thành công')</script>";
            return redirect()->route('Home');
        } else
            return "<script> alert('Thất bại Xóa')</script>";
    }
}
