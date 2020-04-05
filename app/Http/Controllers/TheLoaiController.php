<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TheLoai;
use App\LoaiTin;
class TheLoaiController extends Controller
{

    //lấy thông tin ra 
    public function getDanhSach(){
    	$theloai=TheLoai::all();
    	return view('admin.theloai.danhsach',['theloai'=>$theloai]);
    }
    

    //lấy thông  tin cần sữa ra
    public function getSua($id){
    	$suatheloai = TheLoai::find($id);
    	return view('admin.theloai.sua',['suatheloai'=>$suatheloai]);
    }
     

     //cập nhập thông tin đã sua
    public function postSua(Request $req,$id){
          $suatheloai= TheLoai::find($id);
           $this->validate($req,
           	[
              'txtName'=>'required|unique:TheLoai,Ten|min:3|max:100'
           	],
           	[
               'txtName.required'=>'Ban chua Nhap Ten',
               'txtName.unique'=>'Ten Da Ton Tai',
               'txtName.min'=>'Tên Thể Loại không Ít quá 3 kí Tứ',
               'txtName.max'=>'Tên Kí Tự Phải Có Độ Dài trên 3 kí Tự Và nhỏ Hơn 100 kí Tự'
           	]);
    	    $suatheloai->Ten = $req->txtName;
    	    $suatheloai->save();

    	    return redirect('admin/theloai/sua/'.$id)->with('thongbao','Cập Nhập Thành Công');
    }
     

     //tra lại trang thêm để them du lieu
    public function getThem(){

    	 return view('admin.theloai.them');
    }

     //thêm thông tin vào cdsl
    public function postThem(Request $req){
    	$this->validate($req,
	    	[
	          'txtname' =>'required|unique:TheLoai,Ten|min:3|max:100'
	    	],
	    	[ 
	    		'txtname.required'=>'Bạn chưa Nhập Tên Thể Loại',
	    		'txtname.unique'=>'Ten Da Ton Tai',
	    		'txtname.min'=>'Tên Thể Loại không Ít quá 3 kí Tứ',
	    		'txtname.max'=>'Tên Kí Tự Phải Có Độ Dài trên 3 kí Tự Và nhỏ Hơn 100 kí Tự'
	    	]);

    	$theloai= new TheLoai;
    	$theloai->Ten = $req->txtname;
    	$theloai->save();

    	return redirect('admin/theloai/them')->with('thongbao','Thêm Thành Công');
    }


    //xoa thông tin
    public function getXoa($id){
    	
       $xoatheloai= TheLoai::find($id);
       $xoatheloai->delete();

       return redirect('admin/theloai/danhsach')->with('thongbao','Bạn Đã Xóa Thành Công');
    }

    
}
