
@extends('layout.master')

@section('noidung')
 <div class="container" style="margin-top: 5px;">
	 <div class="row">
		 <div class="col-12 col-sm-12">
		     <div class="row">
		    	<div class="col-6 col-sm-12">
		    		<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
				        <ol class="carousel-indicators">
					         <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active">
	                         </li>
	                         <li data-target="#carouselExampleIndicators" data-slide-to="1">
	                         </li>
	                         <li data-target="#carouselExampleIndicators" data-slide-to="2">
	                         </li>
						        
				        </ol>
				        <div class="carousel-inner">
					             <div class="carousel-item active">
					                 <img class="d-block w-100" src="img/quangcao1.jpg" alt="First slide" style="width: 
					                  100%" height="350">   
					             </div>
					             <div class="carousel-item ">
					                 <img class="d-block w-100" src="img/quangcao2.jpg" alt="First slide" style="width: 100%" height="350">   
					             </div>
					             <div class="carousel-item ">
					                 <img class="d-block w-100" src="img/quangcao3.jpg" alt="First slide" style="width: 100%" height="350">   
					             </div>            
				        </div>
				        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
					        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
					        <span class="sr-only">Previous</span>
				        </a>
				        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
					        <span class="carousel-control-next-icon" aria-hidden="true"></span>
					        <span class="sr-only">Next</span>
				        </a>
		           </div>
	           </div>
            </div>
	     </div>
     </div>
     <div class="row" style="margin-top: 10px;">
			  <div class="col-sm-8 col-8 " >
					  <div class="container">
						    <div class="row">
						    	<div class="col-12 col-sm-12" style="background-color:#EEEEEE;
					    	     border-left: 5px solid #0099CC;">
					    	     <b style="color: #0099CC; font-size: 17px;">{{$loaitin->TheLoai->Ten}} |</b>
					    	     <b>{{$loaitin->Ten}} </b>
						    	
					           </div>
				            </div>
				      </div>

		              @foreach($tintuc as $tt)
		              <a href="chitiettin/{{$tt->id}}">	
					     <div class="row" style="border-bottom: 1px solid #e2e1d9;  margin-bottom: 10px;" >
					    	 <div class="col-sm-4 col-4" style="margin:15px 0px;" id="mouse">
								 <img class="rounded mx-auto d-block" src="img/{{$tt->Hinh}}" style="width: 70%" 
									height="100">
						     </div>
							 <div class="col-sm-8 col-8" style="margin:15px 0px;">                   
						         <h5>{{$tt->TieuDe}}</h5>
						         <p style="color: gray">{{$tt->TomTat}}</p>
								  <small style="color:silver"><?php 
							         $dt= $tt->created_at;
							         echo $dt->diffForHumans($tg); ?>
							      </small>
						     </div>			
					     </div>
					  </a>
			         @endforeach
	                 {{$tintuc->links()}}
		     </div>
		     <div class="col-sm-4 col-4">
					<div class="row" style="margin-bottom: 50px;">
						<div class="col-sm-12 col-12">
							 <div class="col-sm-12 col-12" id="mouse">			 
								<img src="img/quangcao4.jpg" class="rounded" style="width: 100%" height="500">		
							</div>
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
									      <h5 style="color: #3399CC; border-bottom: 3px solid red; width: 125px; margin-top: 30px;">
									      Tin Cập Nhập</h5>
								        </div>
							        </div>
						    		@foreach($tinnoibat as $noibat)
									    <div class="row" style="margin-top: 10px;">
									        <div class="col-sm-3 col-3" id="mouse">
									             <a href="chitiettin/{{$noibat->id}}">
												   <img src="img/{{$noibat->Hinh}}"  class="rounded mx-auto d-block" alt="Paris" style="width: 100%" height="50">  
										         </a>
									        </div>

									        <div class="col-sm-9 col-9">
									             <a href="chitiettin/{{$noibat->id}}">
													 <h6>{{$noibat->TieuDe}}</h6>
												 </a>
												    <small style="color:silver"><?php 
								                      $dt= $noibat->created_at;
								                      echo $th = $dt->diffForHumans($tg); ?>
								                    </small>
								            </div>
							            </div>  
							        @endforeach
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

