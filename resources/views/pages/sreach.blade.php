
@extends('layout.master')

@section('noidung')
 <div class="container" style="margin-top: 5px;">
    <div class="row" style="margin-top: 10px;">
		  <div class="col-sm-8 col-8 ">
				    <div class="row">
				    	 <div class="container">
				    	<div class="col-12 col-sm-12" style="background-color:#EEEEEE;
				    	border-left: 5px solid #0099CC;">
				    	<b style="color: #0099CC; font-size: 17px;">Từ Khóa Tìm Kiếm :</b><b> {{$tukhoa}}</b>
			           </div>
		            </div>
		      </div>

              @foreach($sreach as $tk)

			 <div class="row" style="border-bottom: 1px solid #e2e1d9;  margin-bottom: 10px;" >
			    	<div class="col-sm-4 col-4" style="margin:15px 0px;">
				 <a href="chitiettin/{{$tk->id}}">
					<img class="rounded mx-auto d-block" src="img/{{$tk->Hinh}}" style="width: 70%">
				</a>
					</div>
					<div class="col-sm-8 col-8" style="margin:15px 0px;">
					<a href="chitiettin/{{$tk->id}}">	                   
				 <h4>{{$tk->TieuDe}}</h4>
				 {{$tk->TomTat}}
			    </a>
				</div>			

			</div>
	      @endforeach

	   </div>
		  <div class="col-sm-4 col-4">
		  	
				<div class="row" style="margin-bottom: 50px;">
					<div class="col-sm-12 col-12"> 		 
							<img src="img/quangcao1.jpg" class="rounded" style="width: 100%" height="500">		
					</div>
				</div>

				<div class="row">
					<div class="col-sm-12 col-12">
						<div class="row">
							<div class="col-sm-12 col-12">
						      <h5 style="color: #3399CC; border-bottom: 3px solid red ; width: 75px">Liên Lạc</h5>
					        </div>
				        </div>

					    <div class="row">
							<div class="col-sm-4 col-4">
						       <img src="img/fb.png" class="rounded" style="width: 100%" height="100">
					        </div>
					        <div class="col-sm-4 col-4">
						     <img src="img/intargam.jpg" class="rounded" style="width: 100%" height="100">
					        </div>
					        <div class="col-sm-4 col-4">
						     <img src="img/twitter.png" class="rounded" style="width: 100%" height="100">
					        </div>
				        </div>
					</div>
				</div>
			    
			    <div class="row">
			    	<div class="col-sm-12 col-12">
			    		<div class="row">
							<div class="col-sm-12 col-12">
						      <h5 style="color: #3399CC; border-bottom: 3px solid red; width: 125px; margin-top: 30px;">Tin Cập Nhập</h5>
					        </div>
				        </div>

					    <div class="row">
					    	<div class="container">
								<div class=" col-sm-12 col-12" style=" background-color: #DDDDDD;">
									hoa
								</div>
							</div>
						    
				        </div>
			    	</div>
			    </div>

				<div class="row" style="margin-top: 30px;">
					<div class="col-sm-12 col-12">
						<div class="row">
							<div class="col-sm-12 col-12">
						      <h5 style="color: #3399CC; border-bottom: 3px solid red; width: 50px;">Video</h5>
					        </div>
				        </div>
				        <div class="row">
							<div class="col-sm-12 col-12">
							     <video width="320" height="240" controls>
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
@endsection

