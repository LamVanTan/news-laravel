<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use App\TheLoai;
use App\TinTuc;
use App\LoaiTin;
use App\Comment;
use DB;
use App\UserAdmin;
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
     	return view('pages/LoaiTin',['loaitin'=>$loaitin,'tintuc'=>$tintuc,'tinnoibat'=>$tinnoibat,'tg'=>$now ]);
     }


     public function chitiettin($idtin){
        Carbon::setLocale('vi'); // hiển thị ngôn ngữ tiếng việt.
        $now = Carbon::now();
        $chitiettin=TinTuc::find($idtin);
        $binhluan=Comment::with('UserAdmin')->get();
                      // ->join('UserAdmin', 'UserAdmin.id', '=', 'binhluan.idUser')
                      // ->join('TinTuc', 'TinTuc.id', '=', 'binhluan.idTinTuc')
                      // ->select( 'binhluan.NoiDung','binhluan.created_at','binhluan.idTinTuc','useradmin.name','binhluan.id')
                     

        return view('pages/TinTuc',[ 'chitiettin'=>$chitiettin, 'tg'=>$now , 'binhluan'=>$binhluan]);
     }


     public function sreach(Request $req){
        
          $tukhoa= $req->tkiem;
          Carbon::setLocale('vi'); // hiển thị ngôn ngữ tiếng việt.
          $now = Carbon::now();
          $TinTuc=TinTuc::where('TieuDe','LIKE',"%$tukhoa%")
          ->orwhere('TomTat','LIKE',"%$tukhoa%")
          ->orwhere('NoiDung','LIKE',"%$tukhoa%")
          ->orderBy('id','DESC')
          ->get();
          return view('pages/sreach',['sreach'=>$TinTuc,'tukhoa'=>$tukhoa,'tg'=>$now]);
     }

     public function getdangnhap(){
      return view('pages/Login');
   }

   public function postdangnhap(Request $req){
       
       $email=$req->user;
       $password=$req->password;
       if(Auth::attempt(array('email' => $email, 'password' => $password))){
           return redirect('trangchu');
       }else{
         return redirect('dangnhap')->with('thongbao','Đăng Nhập Thất Bại');
       }

   }

   public function postdangky(Request $req){
       

          $user = new UserAdmin;

           $user->name=$req->name;
           $user->email=$req->user;
           $user->password=bcrypt($req->pass);
           
           $user->save();

           return redirect('dangnhap')->with('TB_dangki','Chúc Mừng Bạn Đăng Kí Thành Công ! Mời Bạn Đăng Nhập');
   }
   
   public function logout(){
      Auth::logout();
      return redirect('trangchu');
    
   }



   public function Comment($id,Request $req){

     $id_tintuc= $id;
     $Comment_tintuc= new Comment;
     $Comment_tintuc->idUser=Auth::user()->id;
     $Comment_tintuc->idTinTuc= $id_tintuc;
     $Comment_tintuc->NoiDung=$req->noidung;
     $Comment_tintuc->save();

     return redirect("chitiettin/$id")->with("thongbao","bình luận thành công");

   }
  
}
