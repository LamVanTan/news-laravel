<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\UserAdmin;
use Auth; //use thư viện auth
class UserController extends Controller
{
    public function getDanhSach(){
      $useradmin=UserAdmin::all();
      return view('admin/user/danhsach',['useradmin'=>$useradmin]);
    }

    public function getThem(){
    	return view('admin/user/them');
    }

    public function postThem(Request $req){
         $this->validate($req,
         	[
               'txtUser'=>'required|unique:UserAdmin,name|min:3',
               'txtPass'=>'required|min:5|max:32',
               'txtRePass'=>'required|same:txtPass',
               'txtEmail'=>'required|unique:UserAdmin,email'

         	],
         	[
               'txtUser.required'=>'Ban Chua Nhap Name',
               'txtUser.unique'=>'Tên Này Đã Tồn Tại',
               'txtUser.min'=>'Tên Này Quá Ngắn',
               'txtPass.required'=>'Password Không được để Trống',
               'txtPass.min'=>'Password quá Ngắn',
               'txtPass.max'=>'password Dài Hơn 5 và Nhỏ Hơn 30 Kí Tự',
               'txtRePass.required'=>'Bạn Cần Nhập Lại Mật Khẩu',
               'txtRePass.same'=>'Password Nhập Lại Chưa Đúng',
               'txtEmail.required'=>'email Không dduocj đẻ Trống',
               'txtEmail.unique'=>'email này đã tồn tại'
         	]);


           $user =new UserAdmin;

           $user->name=$req->txtUser;
           $user->email=$req->txtEmail;
           $user->password=bcrypt($req->txtPass);
           $user->quyen=$req->quyen;

           $user->save();

           return redirect('admin/user/them')->with('thongbao','Thêm Thành Công');
    }


    public function getSua($iduser){

    	$user= UserAdmin::find($iduser);
    	return view('admin/user/sua',['user'=>$user]);
    }

    public function postSua(Request $req,$iduser){
         $user= UserAdmin::find($iduser);

         $this->validate($req,
         	[
               'txtUser'=>'required|unique:UserAdmin,name|min:3'
         	],
         	[
               'txtUser.required'=>'Ban Chua Nhap Name',
               'txtUser.unique'=>'Tên Này Đã Tồn Tại',
               'txtUser.min'=>'Tên Này Quá Ngắn'
         	]);

           $user->name=$req->txtUser;
           $user->quyen=$req->quyen;

           if($req->checkboxpass=="on"){
           	 $this->validate($req,
         	[
               'txtPass'=>'required|min:5|max:32',
               'txtRePass'=>'required|same:txtPass',

         	],
         	[
             
               'txtPass.required'=>'Password Không được để Trống',
               'txtPass.min'=>'Password quá Ngắn',
               'txtPass.max'=>'password Dài Hơn 5 và Nhỏ Hơn 30 Kí Tự',
               'txtRePass.required'=>'Bạn Cần Nhập Lại Mật Khẩu',
               'txtRePass.same'=>'Password Nhập Lại Chưa Đúng',
         	]);

           	  $user->password=bcrypt($req->txtPass);
           }
           $user->save();

           return redirect('admin/user/sua/'.$iduser)->with('thongbao','Cập Nhập Thành Công');
    }



     public function getXoa($id){   
        $XoaUser= UserAdmin::find($id);
        $XoaUser->delete();
        return redirect('admin/user/danhsach')->with('thongbao','Bạn Đã Xóa Thành Công');
    }



    
}
