<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LoaiTin;
use App\TheLoai;
class AjaxController extends Controller
{    

	//lấy thông tin ttuwf bảng loai tin qua idtheloai
     public function getLoaiTin($idtheloai){
        $LoaiTin= LoaiTin::where('idTheLoai',$idtheloai)->get();
        foreach ($LoaiTin as $lt) {
        	echo "<option value='".$lt->id."''>".$lt->Ten."</option>";
        }
     }


    
}
