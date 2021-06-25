<?php

use App\Http\Controllers\FormDangNhap;
use App\Http\Controllers\PhotoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormLogin;
use App\Http\Controllers\workController;
use Illuminate\Support\Facades\App;

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
Route::get('/login/{id}', function ($id) {
    return 'Ban can dang nhap '.$id;
})->name('use');
Route::get('/trangchu/{id}',function($id){
    return redirect()->route('use',$id);
});
// Route::get('/trangchu/{id}',function($id){
//     return redirect()->route('use',$id);
// })->where('id','[1-9]+[a-z]');
Route::get('/kiemtra/{nhapvao}',function($nhapvao){
    return 'hien th '.$nhapvao;
})->whereNumber('nhapvao');

Route::prefix('dongho')->group(function(){
    Route:: get('/ngo',function(){
        echo 'ho ngo';
    });
    Route:: get('/nguyen',function(){
        echo 'ho nguyen';
    });

});
Route::get('/duongdi/{loidi}',function($loidi){
    return ;
})->middleware('Test1Middleware');

Route::match(['get','post'],"Dangnhap",[FormDangNhap::class,'HienthiFormLogin'])->name('hienthi')
    ->middleware('checklogin');

// Route::get('/Login',[FormLogin::class,'Login']);
// Route::post('/Login',[FormLogin::class,'Status'])->name('status');

Route::get('/hienthiuser',[FormLogin::class,'GuiMail']);

Route::prefix('Login')->group(function(){
    Route::get('/',[FormLogin::class,'Login']);
    Route::post('/',[FormLogin::class,'Status'])->name('status');
    Route::get('/register',[FormLogin::class,'register'])->name('register');
    Route::post('/register',[FormLogin::class,'Check_register']);

});

Route::get('/Dangnhap/lang={lang}',function($lang){
    App::setLocale($lang);
    return view('Input_Login');
});

Route::get('/LamviecvoiCollection',[workController::class,'BasicController']);