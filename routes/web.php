<?php

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

//dang nhap
Route::get('admin/dangnhap','Authcontroller@getLogin');
Route::post('admin/dangnhap','Authcontroller@postLogin');
Route::get('admin/dangxuat','Authcontroller@logout');

// Trang quan Trị

Route::group(['prefix'=>'admin','middleware'=>'adminlogin'],function() {
    
    //admin/theloai/danhsach
    Route::group(['prefix'=>'theloai'],function(){
        Route::get('danhsach','TheLoaiController@getDanhSach');
       
         //edit
          Route::get('sua/{id}','TheLoaiController@getSua');
          Route::post('sua/{id}','TheLoaiController@postSua');
         //end edit

          //them
          Route::get('them','TheLoaiController@getThem');
          Route::post('them','TheLoaiController@postThem');
          //end then


          Route::get('xoa/{id}','TheLoaiController@getXoa');
     });
     

     //admin/loaitin/danhsach...
      Route::group(['prefix'=>'loaitin'],function(){
         Route::get('danhsach','LoaiTinController@getDanhSach');

         Route::get('sua/{id}','LoaiTinController@getSua');
         Route::post('sua/{id}','LoaiTinController@postSua');

         Route::post('them','LoaiTinController@postThem');
         Route::get('them','LoaiTinController@getThem');

         Route::get('xoa/{id}','LoaiTinController@getXoa');
     });

      //admin/tintuc/danhsach....
       Route::group(['prefix'=>'tintuc'],function(){
         Route::get('danhsach','TinTucController@getDanhSach');

         Route::get('sua/{id}','TinTucController@getSua');
         Route::post('sua/{id}','TinTucController@postSua');

         Route::post('them','TinTucController@postThem');
         Route::get('them','TinTucController@getThem');

         Route::get('xoa/{id}','TinTucController@getXoa');

     });
       ///ajax lấy thông tin thuộc 1 idtheloai nao dó
       Route::group(['prefix'=>'ajax'],function(){
        Route::get('loaitin/{idTheLoai}','AjaxController@getLoaiTin');
     });

      Route::group(['prefix'=>'user'],function(){
        Route::get('danhsach','UserController@getDanhSach');

        Route::get('them','UserController@getThem');
        Route::post('them','UserController@postThem');

        Route::get('sua/{id}','UserController@getSua');
        Route::post('sua/{id}','UserController@postSua');

        Route::get('xoa/{id}','UserController@getXoa');
      });

}); 


       Route::get('trangchu','PagesController@TrangChu');
       Route::get('loaitin/{id}/{ten}','PagesController@getLoaiTin');   
       Route::get('chitiettin/{id}','PagesController@chitiettin');
       Route::post('sreach','PagesController@sreach');
       Route::get('dangnhap','PagesController@getdangnhap');
       Route::post('dangnhap','PagesController@postdangnhap');
       Route::post('dangky', 'PagesController@postdangky');
       Route::get('dangxuat','PagesController@logout');

       










