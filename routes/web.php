<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\home_controller; 
use App\Http\Controllers\admin_controller; 

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
Route::get('/clear-cache',function(){
    $exitCode= Artisan::call('cache:clear');
});

Route::get('/','home_controller@index')->name('home.index');
Route::get('/home','home_controller@home')->name('home.home');

Route::get('/autocomplete','home_controller@autocomplete')->name('home.autocomplete');

Route::get('/banbe','home_controller@banbe')->name('home.banbe');
Route::get('/canhan','home_controller@canhan')->name('home.canhan');
Route::get('/nguoithan','home_controller@nguoithan')->name('home.nguoithan');
Route::get('/contact','home_controller@contact')->name('home.contact');
Route::get('/about','home_controller@about')->name('home.about');
Route::get('/service','home_controller@service')->name('home.service');

Route::get('/dangnhap','home_controller@get_dangnhap')->name('home.getdangnhap');
Route::get('/dangxuat','home_controller@dangxuat')->name('home.dangxuat');
Route::post('/dangnhap','home_controller@post_dangnhap')->name('home.postdangnhap');
Route::get('/dangky','home_controller@get_dangky')->name('home.getdangky');

Route::get('admin/dangnhap','nhanvien_controller@getdangnhap')->name('get.dangnhap');
Route::post('admin/dangnhap','nhanvien_controller@postdangnhap')->name('post.dangnhap');
Route::get('admin/dangxuat','nhanvien_controller@dangxuat')->name('dangxuat');

// Route::get('/thaydoi/matkhau/', 'nhanvien_controller@thaydoi_matkhau')->name('admin.matkhau');
Route::post('/quenmatkhau', 'nhanvien_controller@quen_matkhau')->name('nhanvien.quenmatkhau');
Route::get('/update-new-pass','nhanvien_controller@update_new_pass')->name('update.pass');
Route::post('/reset-new-pass','nhanvien_controller@reset_new_pass')->name('reset.new_pass');

Route::group(['prefix'=>'admin','middleware'=>'adminlogin'],function(){
    Route::get('/', 'admin_controller@index')->name('admin.index');
    
    Route::get('/doimatkhau', 'profile_controller@matkhau')->name('profile.matkhau');

    
    Route::post('/profile/sua/{id}', 'profile_controller@postSua')->name('profile.sua');

    Route::get('/thaydoi/matkhau/{id}', 'nhanvien_controller@reset_matkhau')->name('nhanvien.reset');

    Route::get('/nhanvien/active/{id}', 'nhanvien_controller@active')->name('nhanvien.active');
    Route::get('/nhanvien/unactive/{id}', 'nhanvien_controller@unactive')->name('nhanvien.unactive');
    
    Route::resources([
        'chucvu'=>'chucvu_controller',
        'banbe'=>'banbe_controller',
        'nguoithan'=>'nguoithan_controller',
        'canhan'=>'canhan_controller',
        'lienhe'=>'lienhe_controller',
        'profile'=>'profile_controller',
        'nhanvien'=>'nhanvien_controller',
    ]);
});

/*Route::prefix('admin')->group(function () {
    Route::get('/', 'admin_controller@index')->name('admin.index');
    Route::resources([
        'danhmuc'=>'danhmuc_controller',
        'khachhang'=>'khachhang_controller',
        'nhanhieu'=>'nhanhieu_controller',
        'xuatxu'=>'xuatxu_controller',
        'sanpham'=>'sanpham_controller',
        'baohanh'=>'baohanh_controller',
        'chucvu'=>'chucvu_controller',
        'nhanvien'=>'nhanvien_controller'
    ]);
}); 
*/