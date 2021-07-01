<?php

namespace App\Http\Controllers;

use App\Http\Requests\Check_Email_Contact;
use App\Http\Requests\check_form_login;
use App\Mail\SendMail;
use App\Models\contacts;
use Illuminate\Http\Request;
use App\Models\User;
use GrahamCampbell\ResultType\Result;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Nexmo\Laravel\Facade\Nexmo;

class NgohuyIch extends Controller
{
    public function indexAdidas(Request $request)
    {
        // $request->session()->flush();
        // dd(Auth::check());
        if(Auth::check()){
            return redirect()->back();
        }else{
            return view('indexAdidas');
        }
    }
    public function Login(Request $request)
    {
        $CheckLogin = Auth::attempt(['name' => $request->username, 'password' => $request->password]);
        if ($CheckLogin and isset($_POST['login'])) {
            // $listUser = User::all()->chunk(3)->toArray();
            // $listUser = User::all()->pluck('name')->toArray();
            // dd($listUser);
            return redirect()->route('Home');
        } else {
            return redirect()->back();
        }
    }
    public function HomeAdidas(Request $request)
    {
        $listUser = User::all();
        $listContact =  User::with('contacts')->get();
        //dd($listContact->contacts);
        return view('List_User', ['listUser' => $listUser, 'request' => $request, 'listContact' => $listContact]);
    }
    public function Signup()
    {
        return view('signupAdidas');
    }
    public function Check_Add_User($request)
    {
        $data = new User();
        $data->name = $request->first_name . ' ' . $request->last_name;
        $data->email = $request->email;
        $data->password = Hash::make($request->password);
        return $data;
    }
    public function Add_Phone_Contacts($request)
    {
        $Phone = $request->phone;
        $CheckID = User::all()->last();
        $CheckID = $CheckID->id;
        $dataContact = new contacts();
        $dataContact->Phone = $Phone;
        $dataContact->User_id = $CheckID;
        return $dataContact;
    }
    public function Check_Signup(check_form_login $check_form_login)
    {
        $data = $this->Check_Add_User($check_form_login);
        if ($data->save()) {
            $dataContact = $this->Add_Phone_Contacts($check_form_login);
            $dataContact->save();
            return redirect()->route('Home');
        } else {
            return "<script> alert('Chưa thêm được dữ liệu')</script>";
        }
    }
    public function Add_AccountUser(Request $request)
    {
        //dd($request);
        $data = $this->Check_Add_User($request);
        if ($data->save()) {
            $dataContact = $this->Add_Phone_Contacts($request);
            $dataContact->save();
            //echo "<script> alert('Thêm mới thành công')</script>";
            return redirect()->route('Home');
        } else {
            return "<script> alert('Chưa thêm được dữ liệu')</script>";
        }
    }
    public function Edit_AccountUser(Request $request)
    {
        $data = User::find($request->Edit_Account);
        $dataContact = contacts::where('user_id', '=', $request->Edit_Account)->get()->toArray();
        $Name = trim($data->name);
        $First_Name_Edit_Account = Str::before($Name, ' ');
        $Last_Name_Edit_Account = Str::after($Name, ' ');
        $Phone = $dataContact[0]['phone'];
        // $Last_Name_Edit_Account = Str::replace(' ','_',$Last_Name_Edit_Account);
        //dd($Last_Name_Edit_Account);
        $Email_Edit_Account = $data->email;
        $listUser = User::all();
        $status = 1;
        $listContact =  User::with('contacts')->get();
        // $listUser = $listUser->toArray();
        // dd($listUser[0]['id']);
        return view(
            'List_User',
            [
                'listContact' => $listContact,
                'status' => $status,
                'request' => $request,
                'listUser' => $listUser,
                'First_Name_Edit_Account' => $First_Name_Edit_Account,
                'Last_Name_Edit_Account' => $Last_Name_Edit_Account,
                'Email_Edit_Account' => $Email_Edit_Account,
                'Phone' => $Phone
            ]
        );
    }
    public function Perform_Edit_AccountUser(Request $request)
    {
        $data = User::where('id', '=', $request->Edit_Account)
            ->Update([
                'name' => $request->first_name . ' ' . $request->last_name,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);
        $dataContact = contacts::where('user_id', '=', $request->Edit_Account)
            ->Update(['phone' => $request->phone]);
        if ($data) {
            return redirect()->route('Home');
        } else
            return "<script> alert('Thất bại cập nhật')</script>";
    }
    public function Delete_AccountUser($Delete_Account)
    {
        $data = User::where('id', '=', $Delete_Account)
            ->delete();
        if ($data) {
            return redirect()->route('Home');
        } else
            return "<script> alert('Thất bại Xóa')</script>";
    }
    public function languages($lang, Request $request)
    {
        App::setLocale($lang);
        $listUser = User::all();
        $listContact =  User::with('contacts')->get();
        return view('List_User', ['listUser' => $listUser, 'request' => $request, 'listContact' => $listContact]);
        // return redirect()->route('Home');
    }
    public function Forgot_Pass()
    {
        return view('Forgot_Password');
    }
    public function Get_Forgot_Pass()
    {
        return view('Fresh_Password');
    }
    
    public function Check_Forgot_Pass(Check_Email_Contact $check_Email_Contact)
    {
        $CodeQR = rand(1000, 10000);
        $gmail = $check_Email_Contact->email;
        $send = [
            'title' => "Có phải bạn quên mật khẩu",
            'body' => "Mã kích hoạt: " . $CodeQR
        ];
        $check_email = User::where('email', '=', $gmail)->get();
        if ($check_email->isNotEmpty()) {
            Mail::to($gmail)->send(new SendMail($send));
            return view('Fresh_Password', ['CodeQR' => $CodeQR, 'email' => $gmail]);
        } else {
            return redirect()->back();
        }
    }

    public function Fresh_Pass(Request $request)
    {
        //     $ContentValidate = [
        //         'password.required' =>'Trường này không được để trống',
        //         'password.min' =>'Chuỗi kí tự quá ngắn',
        //         'confirm_password.required' =>'Trường này không được để trống',
        //         'confirm_password.same' =>'Mật khẩu không khớp'
        //     ];

        //     $checkValidate = $request->validate([
        //         'password' => 'bail|required|min:8',
        //         'confirm_password' => 'bail|required|same:password'
        //     ],$ContentValidate);

        //     // return $checkValidate;
        //    dd($checkValidate);
        $password = $request->password;
        $confirm_password = $request->confirm_password;
        if (strcmp($password, $confirm_password) == 0) {
            $update = User::where('email', '=', $request->email)
                ->update(['password' => Hash::make($password)]);
            return redirect()->route('Home');
        } else {
            return redirect()->back();
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
