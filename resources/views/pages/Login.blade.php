@extends('layout.master')
@section('noidung')
<div class="row">
   <div class="col-sm-3"></div>
   <div class="col-12 col-sm-6" style="padding: 15px 0;">
      <div class="home_login">
         <div class="btn_button">
            <button class="btn_sub">Đăng Nhập</button> 
            <button class="btn_sub">Đăng Ký</button> 
         </div>
         <form action="dangnhap" class="login_form" method="POST" id="login">
            @if(session('thongbao'))
            <div class="alert alert-warning tb" style="overflow: hidden;">
               {{session('thongbao')}}
            </div>
            @endif
            @if(session('TB_dangki'))
            <div class="alert alert-success tb" style="overflow: hidden;">
               {{session('TB_dangki')}}
            </div>
            @endif
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <input class="txt" type="text" name="user" placeholder="Email Hoặc SDT"/>
            <input class="txt" type="password" name="password" placeholder="Mật Khẩu"/>
            <input class="submit" type="submit" name="submit" value="Đăng Nhập">
         </form>

         <form action="dangky" class="register_form" method="POST" id="register">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <input class="txt" type="text" name="name" placeholder="Tên Đăng Nhập"/>
            <input class="txt" type="text" name="user" placeholder="Email Hoặc SDT"/>
            <input class="txt" type="password" name="pass" id="password" placeholder="Mật Khẩu"/>
            <input class="txt" type="password" name="passreset" placeholder="Nhập Lại Mật Khẩu"/>
            <input class="submit" type="submit" name="submit" value="Đăng Ký">
         </form>

      </div>
   </div>
   <div class="col-sm-3"></div>
</div>
<script type="text/javascript">
   $(document).ready(function(){
   	$(".btn_sub").click(function(){
   			$(".login_form").toggleClass("showed");
   	});
   
   	$(".btn_sub").click(function(){
   			$(".register_form").toggleClass("showeds");
   	});
   
   	$(".btn_sub").click(function(){
   			$(".btn").toggleClass("show");
   	});
   
   });
   
   
   
   if($("#login").length >0){
   	$("#login").validate({
   		 rules:{
                user:{
                   required:true,
                },
                password:{
                	required:true,
                }
     	   	  },
     	   	  messages:{
                user:{
                	required:"<span><i class='fas fa-exclamation-triangle'></i></span> Trường Này Không Được Để Trống"
                },
                password:{
                	required:"<span><i class='fas fa-exclamation-triangle'></i></span> Trường Này Không Được Để Trống"
                },
     	   	  },
   	});
   }
     
     if($("#register").length>0){
     	  $("#register").validate({
   		 rules:{
     	   	  	  name:{
                   required:true,
                   minlength:3,
                   maxlength:32,
                },
                user:{
                   required:true,
                   email:true,
                },
                pass:{
                   required:true,
                   minlength:6,
                },
                passreset:{
                	required:true,
                	equalTo: "#password"
                },
                
     	   	  },
     	   	  messages:{
                 name:{
                 	required:"<span><i class='fas fa-exclamation-triangle'></i></span> Trường Này Không Được Để Trống",
                 	minlength:"Tên Quá Ngắn, Phải Có Ít Nhất 3 Kí Tự",
                 	maxlength:"Tên Không Được Quá 32 Kí Tự"
                 },
   
                 user:{
                 	required:"<span><i class='fas fa-exclamation-triangle'></i></span> Trường Này Không Được Để Trống",
                 	email:"Sai Định Dạng Email"
                 },
                 pass:{
                 	required:"<span><i class='fas fa-exclamation-triangle'></i></span> Trường Này Không Được Để Trống",
                 	minlength:"Mật Khẩu Quá Ngắn ,Phải Có Ít Nhất 6 Kí Tự"
                 },
                 passreset:{
                   required:"<span><i class='fas fa-exclamation-triangle'></i></span> Trường Này Không Được Để Trống",
                 	equalTo:"Mật Khẩu Không Trùng Khớp"
                 },
                 
     	   	 }
   	});
     }
       
   
</script>
@endsection
  