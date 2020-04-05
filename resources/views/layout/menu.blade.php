

<div class="row" >
	<div class="container">

	<div class="col-12-sm col-12" style="border-bottom: 2px solid red;" >
		<nav class="navbar navbar-expand-sm navbar-dark ">
		     <ul class="navbar-nav">
			    <li class="nav-item" >
			    	<a class="nav-link" href="trangchu" id="background"><i class="fas fa-home"></i></a>
		        </li>
		        @foreach($TheLoai as $TL)
		        @if(count($TL->LoaiTin)>0)
		       <li class="nav-item dropdown">  
		        <a class="nav-link" id="background" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: #0099CC;">
		        	<b>{{$TL->Ten}}</b></a>
		           <div class="dropdown-menu" aria-labelledby="navbarDropdown"  >
		              @foreach($TL->LoaiTin as $lt)
		             <a class="dropdown-item" href="loaitin/{{$lt->id}}/{{$lt->Ten}}" id="background1">{{$lt->Ten}}</a>
		               @endforeach
		          </div>	         
	      </li>
	       @endif
            @endforeach
		    </ul>
		</nav>

	
	</div>
</div>
</div>