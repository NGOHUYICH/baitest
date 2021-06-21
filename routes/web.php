<?php

use App\Http\Controllers\FormDangNhap;
use App\Http\Controllers\PhotoController;
use Illuminate\Support\Facades\Route;

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

Route::match(['get','post'],"Dangnhap",[FormDangNhap::class,'HienthiFormLogin'])->name('hienthi');
