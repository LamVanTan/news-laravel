<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LoaiTin;
use App\TheLoai;
class LoaiTinController extends Controller
{

    //lấy Danh Sách Tin Tức
    public function getDanhSach(){
    	$ListLoaiTin= LoaiTin::all();
    	return view('admin/loaitin/danhsach',['loaitin'=>$ListLoaiTin]);
    }

   
   //trả về Form thêm dữ Liệu
    public function getThem(){
    	$theloai=TheLoai::all();
    	return view('admin/loaitin/them',['theloai'=> $theloai]);
    }


    //Thêm Dữ liệu vào csdl
    public function postThem(Request $req){
        $this->validate($req,
        	[
              'txtLoaiTin'=>'required|unique:LoaiTin,Ten|min:3|max:100'
        	],
        	[
             'txtLoaiTin.required'=>'Bạn Chưa Nhập Tên Loại Tin',
             'txtLoaiTin.unique'=>'Tên Loại Tin Này Đã Tồn Tại',
             'txtLoaiTin.min'=>'Tên Này Quá Ngắn',
             'txtLoaiTin.max'=>'Tên phải hơn 3 kí tự và nhỏ hơn 100 kí tự'
        	]);

          $ThemLoaiTin = new LoaiTin;
          $ThemLoaiTin->idTheLoai =$req->theloai;
          $ThemLoaiTin->Ten=$req->txtLoaiTin;
          $ThemLoaiTin->save();
          return redirect('admin/loaitin/them')->with('thongbao','Thêm Thành Công');
    }


    //lấy thông tin cần sua loại tin

    public function getSua($idloaiTin){
    	$theloai= TheLoai::all();
    	$loaitin=LoaiTin::find($idloaiTin);
    	return view('admin/loaitin/sua',['sualoaitin'=>$loaitin,'theloai'=>$theloai]);
    }

    //cập nhập thông tin cần sũa vao csdl
    public function postSua(Request $req,$idloaitin){
        $sualoaitin=LoaiTin::find($idloaitin);
        $this->validate($req,
        	[
               'txtCateName'=>'required|min:3'
        	],
        	[
                'txtCateName.required'=>'Bạn Chưa Nhập Thông Tin',
                'txtCateName.min'=>'Tên Này Quá Ngắn'
        	]);

            $sualoaitin->idTheLoai=$req->theloai;
            $sualoaitin->Ten=$req->txtCateName;
            $sualoaitin->save();
           return redirect('admin/loaitin/sua/'.$idloaitin)->with('thongbao','Cập Nhập Thành Công');
    }

    

    //xóa dữ liệu 
    public function getXoa($idloaitin){
        
        $LoaiTin= LoaiTin::find($idloaitin);
        $LoaiTin->delete();

        return redirect('admin/loaitin/danhsach')->with('thongbao','Bạn Đã Xóa Thành Công');
    }


    
}
