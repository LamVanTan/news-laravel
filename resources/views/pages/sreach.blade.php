@extends('layout.master')
@section('noidung')
<div class="container" style="margin-top:5px;">
   <div class="row" style="margin-top: 10px;">
      <div class="col-sm-8 col-12 ">
         <div class="container">
           <div class="row">
            <div class="col-12 col-sm-12" style="background-color:#EEEEEE;
               border-left: 5px solid #0099CC;">
               <b style="color: #0099CC; font-size: 17px;">Từ Khóa Tìm Kiếm :</b><b> {{$tukhoa}}</b>
            </div>
         </div>
         </div>
         @foreach($sreach as $tk)
         <a href="chitiettin/{{$tk->id}}">
         <div class="row" style="border-bottom: 1px solid #e2e1d9;  margin-bottom: 10px;" >
            <div class="col-sm-4 col-12" style="margin:5% 0px;" id="mouse">
               <img class="rounded mx-auto d-block img-fluid" src="img/{{$tk->Hinh}}" style="width:100%" >
            </div>
            <div class="col-sm-8" style="margin:5% 0px;">
               <h5>{{$tk->TieuDe}}</h5>
               <p style="color: gray">{{$tk->TomTat}}</p>
               <small style="color:silver"><?php 
                  $dt= $tk->created_at;
                  echo $dt->diffForHumans($tg); ?>
               </small>
            </div>
         </div>
      </a>
         @endforeach
      </div>
      <div class="col-sm-4 col-12 QC">
         <div class="row" style="margin-bottom: 50px;">
            <div class="col-sm-12 qc1">
               <div id="close">
                  <button type="button" class="close" style="outline: none;">×</button>
                  <img src="img/quangcao4.jpg" class="rounded img-fluid" style="width: 100%">
               </div>
            </div>
         </div>
           
            <div class="row" style="margin-top: 30px;">
               <div class="col-sm-12">
                  <div class="row">
                     <div class="col-sm-12">
                        <h5 style="color: #3399CC; border-bottom: 3px solid red; width: 50px; border-radius: 5px;">Video</h5>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-sm-12">
                        <video width="100%" controls>
                           <source src="video/video.mp4" type="video/mp4">
                           <source src="movie.ogg" type="video/ogg">
                           Your browser does not support the video tag.
                        </video>
                     </div>
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
</style>
<script type="text/javascript">
   $(document).ready(function(){
      $(".QC .qc1").click(function(){
         $(this).find("#close").hide();
      })
   });
    
</script>
@endsection