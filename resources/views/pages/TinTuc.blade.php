
@extends('layout.master')
@section('noidung')
<div class="container">
 <div class="row" style="margin-top: 10px;">
     <div class="col-sm-9 col-9 ">
                   <b>{{$chitiettin->TieuDe}}</b>
                    <small style="color:silver"><?php 
                      $dt= $chitiettin->created_at;
                      echo $th = $dt->diffForHumans($tg); ?>
                    </small>
                    <p>{{$chitiettin->TomTat}}
  	                <img class="rounded " src="img/{{$chitiettin->Hinh}}" alt="img" style="width: 100%" height="350px">
              
                <!-- Post Content -->
                <p style="font-size:18px;">{{$chitiettin->NoiDung}}</p>
                <hr>

                <!-- Blog Comments -->

                <!-- Comments Form -->
                <div class="row">
                    <div class="col-sm-12 col-12">
                    <h4>Viết bình luận ...<span class="glyphicon glyphicon-pencil"></span></h4>
                    <form role="form">
                        <div class="form-group">
                            <textarea class="form-control" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Gửi</button>
                    </form>
                </div>
            </div>

                <hr>

                <!-- Posted Comments -->

                <!-- Comment -->
                <div class="media">
                   
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <!-- <h4 class="media-heading">
                            <small></small>
                        </h4> -->
                        
                    </div>
                </div>

                <!-- Comment -->
  </div>

   <div class="col-sm-3 col-3">
  	<div class="col-sm-12 col-12" style="margin-bottom: 10px;">        
         <img src="img/quangcao1.jpg" class="rounded" style="width: 100%" height="500">      
    </div>
    <div class="col-sm-12 col-12">       
        <img src="img/quangcao2.jpg" class="rounded" style="width: 100%" height="500">      
    </div>
    </div>
   
  </div>

</div>
</div>
    
@endsection

