<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use App\TinTuc;
use App\UserAdmin;
class Authcontroller extends Controller
{
    //
    public function getLogin(){
    
      return view('admin.dangnhap');
    }

    public function postLogin(Request $req){
       $this->validate($req,
        [
          'mail'=>'required',
          'pass'=>'required'
        ],
       [
           'mail.required'=>'email không được để trống',
           'pass.required'=>'password không được để trống'
       ]);
        

        $email =$req->mail;
        $password =$req->pass;

    if (Auth::attempt(array('email' => $email, 'password' => $password)))
    {
        return redirect('admin/theloai/danhsach');
    } else {
        return redirect('admin/dangnhap')->with('thongbao','Đăng Nhập Thất Bại');
    }
    }

   public function logout(){
      Auth::logout();
      return redirect('admin/dangnhap');
    
   }

   
    
}
