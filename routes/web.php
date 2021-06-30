<?php

use App\Http\Controllers\FormDangNhap;
use App\Http\Controllers\PhotoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormLogin;
use App\Http\Controllers\NgohuyIch;
use App\Http\Controllers\workController;
use App\Http\Controllers\WorkDatabase;
use App\Models\customers;
use App\Models\invoice_lines;
use App\Models\invoices;
use Illuminate\Support\Facades\App;
use App\Models\loaisp;
use App\Models\products;
use App\Models\sanpham;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Invoices as GlobalInvoices;
use Illuminate\Support\Facades\DB;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
// Route::get('/login/{id}', function ($id) {
//     return 'Ban can dang nhap '.$id;
// })->name('use');
// Route::get('/trangchu/{id}',function($id){
//     return redirect()->route('use',$id);
// });
// // Route::get('/trangchu/{id}',function($id){
// //     return redirect()->route('use',$id);
// // })->where('id','[1-9]+[a-z]');
// Route::get('/kiemtra/{nhapvao}',function($nhapvao){
//     return 'hien th '.$nhapvao;
// })->whereNumber('nhapvao');

// Route::prefix('dongho')->group(function(){
//     Route:: get('/ngo',function(){
//         echo 'ho ngo';
//     });
//     Route:: get('/nguyen',function(){
//         echo 'ho nguyen';
//     });

// });
// Route::get('/duongdi/{loidi}',function($loidi){
//     return ;
// })->middleware('Test1Middleware');

// Route::match(['get','post'],"Dangnhap",[FormDangNhap::class,'HienthiFormLogin'])->name('hienthi')
//     ->middleware('checklogin');

// // Route::get('/Login',[FormLogin::class,'Login']);
// // Route::post('/Login',[FormLogin::class,'Status'])->name('status');

// Route::get('/hienthiuser',[FormLogin::class,'GuiMail']);

// Route::prefix('Login')->group(function(){
//     Route::get('/',[FormLogin::class,'Login']);
//     Route::post('/',[FormLogin::class,'Status'])->name('status');
//     Route::get('/register',[FormLogin::class,'register'])->name('register');
//     Route::post('/register',[FormLogin::class,'Check_register']);

// });

// Route::get('/Dangnhap/lang={lang}',function($lang){
//     App::setLocale($lang);
//     return view('Input_Login');
// });

// Route::get('/LamviecvoiCollection',[workController::class,'BasicController']);

// Route::get('orm',function(){

//     //$loaisp = loaisp::all();
//     // chunk 
//     // loaisp::chunk(2,function($loaisp){
//     //     foreach($loaisp as $loaisp){
//     //             echo $loaisp->ten."<br>";
//     //     }
//     // });
//     // **  cursor
//     // foreach(loaisp::where('ten','!=','')->cursor() as $loaispCursor){
//     //         echo $loaispCursor->ten."<br>";
//     // }
//     //dd($loaisp->toArray());
//     //* them moi
//     // $themMoiLoaisp = new loaisp();
//     // $themMoiLoaisp->ten = 'dau mo';
//     // $themMoiLoaisp->mota = 'them tu thit lon, dau xanh nguyen chat';
//     // $themMoiLoaisp->save();
//     // Session::flash('sucess','Dang ki thanh cong');
//     // * Update
//     //  $updateLoaisp = loaisp::where('ten','=','dau mo')
//     //                     ->update(['ten'=>'giay','mota'=>'the thao di cung voi adidas']);
//     // * Delete
//     // $deleteLoaisp = loaisp::find(4)->delete();   
//     // dd($updateLoaisp->toArray());    

//     // * hien thi Relationship
//     //  $hienthi = loaisp::find(1)
//     //     ->sanpham->toArray();
//    // $hienthi = sanpham::find(1)->loaisp->toArray();
//     $hienthi = sanpham::find(1)->hienthi()->toArray();
//     dd($hienthi);

// });

Route::get(
    'lamvieccsdl',
    [WorkDatabase::class, 'Work_Request_DB']
    //$hienthi = customers::find(1)->invoices->toArray();
    //$hienthi = invoices::find(1)->customers->get()->toArray();
    // $hienthi = invoice_lines::find(1)->customers->toArray();
    // $hienthi = customers::find(1)->invoice_lines->toJson();
    //$hienthi= invoices::Customer_MaxTotal();
    //$hienthi = invoices::where(DB::raw("Month(date)"))
    //  $hienthi = products::find(2)->invoices->toJson();
    // 9. liệt kê danh sách khách hàng đã không mua hàng được 6 tháng
    // $hienthi = customers::No_Purchase();
    // dd($hienthi);
);

Route::prefix('AdidasNgoIch')->group(function () {
    Route::get('/', [NgohuyIch::class, 'indexAdidas']);
    Route::post('/', [NgohuyIch::class, 'Login'])->name('AdidasHome');
    Route::get('/Home', [NgohuyIch::class, 'HomeAdidas'])->name('Home')->middleware('Check_Admin');
    Route::get('SignUp', [NgohuyIch::class, 'Signup'])->name('AdidasSignup');
    Route::post('SignUp', [NgohuyIch::class, 'Check_Signup'])->name('AdidasCheckSigup');
    Route::post('/Home/User/Add', [NgohuyIch::class, 'Add_AccountUser'])
        ->name('AdidasAddAccountUser');
    Route::get('/Home/Edit_Account={Edit_Account}', [NgohuyIch::class, 'Edit_AccountUser'])
        ->name('AdidasEditAccountUser'); 
    Route::post('Home/Edit_Account={Edit_Account}/Perform', [NgohuyIch::class, 'Perform_Edit_AccountUser'])
        ->name('AdidasPerformEditAccountUser');
    Route::get('/Home/Delete_Account={Delete_Account}',[NgohuyIch::class,'Delete_AccountUser']);
    Route::get('Home/lang={lang}',[NgohuyIch::class,'languages'])->name('languages');
    
});
// Route::get('haha',function(){
//     echo 'haha' ;
// });