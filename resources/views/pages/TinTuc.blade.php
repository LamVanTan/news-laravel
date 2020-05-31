@extends('layout.master')
@section('noidung')
<div class="container">
   <div class="row" style="margin-top: 10px;">
      <div class="col-sm-9 col-12 ">
         <b>{{$chitiettin->TieuDe}}</b>
         <small style="color:silver"><?php 
            $dt= $chitiettin->created_at;
            echo $th = $dt->diffForHumans($tg); ?>
         </small>
         <p style="line-height:30px">{{$chitiettin->TomTat}}
            <img class="rounded img-fluid" src="img/{{$chitiettin->Hinh}}" alt="img" style="width: 100%" height="350px">
         <p style="line-height: 30px;">{{$chitiettin->NoiDung}}</p>
        


          @if(Auth::check())  
         <div class="row">
            <div class="col-sm-12 col-12">
               <h4>Viết bình luận<span class="glyphicon glyphicon-pencil"></span></h4>
               <form action="Comment/{{$chitiettin->id}}" method="POST" role="form">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                  @if(session('thongbao'))
                  <div class="alert alert-success" style="overflow: hidden;">
                     {{session('thongbao')}}
                  </div>
                  @endif
                  <div class="form-group">
                     <textarea class="form-control" rows="3" name="noidung"></textarea>
                  </div>
                  <button type="submit" class="btn" style="background-color: #333333;color: white;font-weight: bold;">Gửi</button>
               </form>
            </div>
         </div>
         @endif
          
         <hr>
         <!-- Posted Comments -->
         <!-- Comment -->
        
         @foreach($binhluan as $bl)
            @if($bl->idTinTuc == $chitiettin->id)
              <div class="row like">
                <div class="col-sm-12">
               <b style="display: block;">{{$bl->name}}</b>

               <small style="font-size: 13px; padding: 5px 15px;">{{$bl->NoiDung}}</small>

               <small style="color:silver">
                <?php  $time= $bl->created_at; echo $time;  ?>
               </small>

               <p style="margin-left: 20px;" id="like"><i class="fas fa-thumbs-up"></i> <span class="solike"></span></p>

             </div>
             
         </div>
         <hr>
         @endif
         @endforeach
         

      </div>
      <div class="col-sm-3 col-12" >
         <div class="row QC" style="margin-bottom: 50px;margin-top: 23px;">
            <div class="col-sm-12 qc1">
               <div id="close">
                  <button type="button" class="close" style="outline: none;">×</button>
                  <img src="img/quangcao2.jpg" class="rounded img-fluid" style="width: 100%">
               </div>
            </div>
            <div class="col-sm-12 qc1">
               <div id="close">
                  <button type="button" class="close" style="outline: none;">×</button>
                  <img src="img/quangcao3.jpg" class="rounded img-fluid" style="width: 100%">
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<style type="text/css">
   .close{
   position: relative;top:25px;
   right:5px;
   color: white;
   }
   .binhluan{
    display: block;
    font-weight: bold;
    color:#666666; 
    text-align: center;
    margin-bottom: 5px;
    width: 25%;
    border-radius: 10px;
    
   }
</style>
<script type="text/javascript">
  var dem=0;
  var i;
        $(document).ready(function(){
           $(".like").click(function(){
               var so= dem+1;
               for(i=0;i<=so;i++){
               $(this).find(".solike").html(so);
             }
           });
     });
   
     $(document).ready(function(){
       $(".QC .qc1").click(function(){
         $(this).find("#close").hide();
       })
     });
    
</script>
@endsection