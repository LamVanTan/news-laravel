<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TheLoai;
use App\TinTuc;
use App\LoaiTin;
class TinTucController extends Controller
{   

	//lây danh sach thong tin ra 
    public function getDanhSach(){
    	$listTinTuc= TinTuc::orderBy('id','DESC')->get();
    	return view('admin/tintuc/danhsach',['listTinTuc'=>$listTinTuc]);
    }

    ///lấy thông tin ra và hiển thị fỏm them thong tin
    public function getThem(){
    	$TheLoai= TheLoai::all();
    	$LoaiTin= LoaiTin::all();
    	return view('admin/tintuc/them',['TheLoai'=>$TheLoai,'LoaiTin'=>$LoaiTin]);
    }

    //them du kieu vào csdl
    public function postThem(Request $req){
        
        $this->validate($req,
      	[
            'tieude'=>'required|unique:LoaiTin,Ten|min:3|max:100',
            'loaitin'=>'required',
            'tomtat'=>'required',
            'noidung'=>'required'

      	],
      	[
           'tieude.required'=>'Tiêu Đề Không Được Bỏ Trống',
           'tieude.unique'=>'Tiêu Đề Này Đã Có',
           'tieude.min'=>'Tiêu Đề Này Quá Ngắn',
           'tieude.max'=>'Tiêu Đề phải hơn 3 kí tự và nhỏ hơn 100 kí tự',
           'loaitin.required'=>'Loại Tin Không Được Bỏ Trống',
           'tomtat.required'=>'Tóm Tắt Không Được Bỏ Trống',
           'noidung.required'=>'Nội Dung Không Được Bỏ Trống'
      	]);

      $TinTuc = new TinTuc;
      $TinTuc->idLoaiTin =$req->loaitin;
      $TinTuc->TieuDe=$req->tieude;
      $TinTuc->TomTat=$req->tomtat;
      $TinTuc->NoiDung=$req->noidung;
      $TinTuc->NoiBat=$req->noibat;
      $TinTuc->SoLuotXem=0;
      if($req->hasFile('fImages')){
        $file=$req->file('fImages');
        $duoi=$file->getClientOriginalExtension();
        if($duoi!="jpg" && $duoi!="png" && $duoi!="jpeg"){
           return redirect('admin/tintuc/them')->with('loi','hình ảnh sai định dạng');
        }
       
        $name= $file->getClientOriginalName();
        //  $Hinh=str_random(4)."_".$name;

        // while (file_exists("img/adminTinTuc/".$Hinh)) {
        // 	$Hinh= str_random(4)."_".$name;
        // }
         $file->move("img",$name);
        $TinTuc->Hinh = $name;
      }
      else{
      	$TinTuc->Hinh="";
      }
       $TinTuc->save();
      return redirect('admin/tintuc/them')->with('thongbao','Thêm Thành Công');
    }
    

    //lay thong tin đẻ sua ra
    public function getSua($id){
        $TheLoai= TheLoai::all();
        $LoaiTin= LoaiTin::all();
        $TinTuc =TinTuc::find($id);
        return view('admin/tintuc/sua',['TheLoai'=>$TheLoai,'LoaiTin'=>$LoaiTin,'TinTuc'=>$TinTuc]);
    }
     

     //cap nhap lại thong tin
    public function postSua(Request $req,$idtintuc){
          $TinTuc= TinTuc::find($idtintuc);
           $this->validate($req,
	      	[
	            'tieude'=>'required|unique:LoaiTin,Ten|min:3|max:100',
	            'loaitin'=>'required',
	            'tomtat'=>'required',
	            'noidung'=>'required'

	      	],
	      	[
	           'tieude.required'=>'Tiêu Đề Không Được Bỏ Trống',
	           'tieude.unique'=>'Tiêu Đề Này Đã Có',
	           'tieude.min'=>'Tiêu Đề Này Quá Ngắn',
	           'tieude.max'=>'Tiêu Đề phải hơn 3 kí tự và nhỏ hơn 100 kí tự',
	           'loaitin.required'=>'Loại Tin Không Được Bỏ Trống',
	           'tomtat.required'=>'Tóm Tắt Không Được Bỏ Trống',
	           'noidung.required'=>'Nội Dung Không Được Bỏ Trống'
	      	]);

		      $TinTuc->idLoaiTin =$req->loaitin;
		      $TinTuc->TieuDe=$req->tieude;
		      $TinTuc->TomTat=$req->tomtat;
		      $TinTuc->NoiDung=$req->noidung;
		      $TinTuc->NoiBat=$req->noibat;
		      $TinTuc->SoLuotXem=0;

		      if($req->hasFile('fImages')){
		        $file=$req->file('fImages');
		        $duoi=$file->getClientOriginalExtension();
		        if($duoi!="jpg" && $duoi!="png" && $duoi!="jpeg"){
		           return redirect('admin/tintuc/sua')->with('loi','hình ảnh sai định dạng');
		        }
		       
		        $name= $file->getClientOriginalName();
		         $file->move("img",$name);
		         unlink("img/".$TinTuc->Hinh);
		        $TinTuc->Hinh = $name;
		      }
		    
		       $TinTuc->save();
		      return redirect('admin/tintuc/sua/'.$idtintuc)->with('thongbao','Cập Nhập Thành Công');

    }

   //xoa 
    public function getXoa($idtintuc){
        
        $TinTuc= TinTuc::find($idtintuc);
        $TinTuc->delete();

        return redirect('admin/tintuc/danhsach')->with('thongbao','Bạn Đã Xóa Thành Công');
    }
    
}
