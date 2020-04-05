<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\TheLoai;
use App\TinTuc;
use App\LoaiTin;
use DB;
use Carbon\Carbon;
class PagesController extends Controller
{   

    function __construct(){
        $TheLoai= TheLoai::all();
        view()->share('TheLoai',$TheLoai);
       
        
    }

    public function TrangChu(){
      $slie = DB::table('TinTuc')
      ->where('NoiBat',1)
      ->take(3)
      ->get();

      $tinthuong=TinTuc::where('NoiBat',0)->orderBy('id','DESC')->skip(1)
      ->take(3)
      ->get();

      $tinthuong1=TinTuc::where('NoiBat',0)->orderBy('id','DESC')->skip(4)
      ->take(1000)
      ->get();


      Carbon::setLocale('vi'); // hiển thị ngôn ngữ tiếng việt.
      $now = Carbon::now();

      $tinnoibat=TinTuc::where('NoiBat',1)
      ->orderBy('created_at','DESC')
      ->take(10)
      ->get();    
      return view('pages/TrangChu',['tinthuong'=>$tinthuong,'tt'=>$slie,'tinnoibat'=>$tinnoibat,'tg'=>$now,'tinthuong1'=>$tinthuong1]);    
     }

     public function getLoaiTin($id){
        Carbon::setLocale('vi'); // hiển thị ngôn ngữ tiếng việt.
        $now = Carbon::now();
        $loaitin= LoaiTin::find($id);
        $tintuc= TinTuc::where('idLoaiTin',$id)
        ->orderBy('id','DESC')
        ->paginate(5);
        $tinnoibat=TinTuc::where('idLoaiTin',$id)
        ->orwhere('NoiBat',1)
        ->orderBy('id','DESC')
        ->take(3)
        ->get();
     	return view('pages/LoaiTin',['loaitin'=>$loaitin,'tintuc'=>$tintuc,'tinnoibat'=>$tinnoibat,'tg'=>$now]);
     }


     public function chitiettin($idtin){
        Carbon::setLocale('vi'); // hiển thị ngôn ngữ tiếng việt.
        $now = Carbon::now();
        $chitiettin=TinTuc::find($idtin);
        return view('pages/TinTuc',['chitiettin'=>$chitiettin,'tg'=>$now]);
     }


     public function sreach(Request $req){
        
          $tukhoa= $req->tkiem;
          $TinTuc=TinTuc::where('TieuDe','LIKE',"%$tukhoa%")
          ->orwhere('TomTat','LIKE',"%$tukhoa%")
          ->orwhere('NoiDung','LIKE',"%$tukhoa%")
          ->orderBy('id','DESC')
          ->get();
          return view('pages/sreach',['sreach'=>$TinTuc,'tukhoa'=>$tukhoa]);
     }

    
}
