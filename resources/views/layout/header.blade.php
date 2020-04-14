 

<div class="row bg-light">

	<div class="col-3-sm col-3 float-right">
		
		<img src="img/news1.png" style="margin:5px 50px;">
	
</div>

	<div class="col-6-sm col-6">
		 <div class="search-header">
			 <div class="input-header">
			 	 <form action="sreach" method="POST">
			 	 	 <input type="hidden" name="_token" value="{{csrf_token()}}">
				 	 <input type="text" name="tkiem" placeholder=" search...." required="">
	                 <i class="fas fa-search"></i>
                 </form>
			 </div>
         </div> 
	</div>

	<div class="col-3-sm col-3">
		<nav class="navbar navbar-expand-sm justify-content-center">
		     <ul class="navbar-nav">
			    <li class="nav-item"  style="position: relative;top:5px;">
		        @if(Auth::check()) <span >{{Auth::user()->name}} </span>@endif
		        <a class="nav-link"  id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:silver; display: inline;">
		        	 <i class="fas fa-caret-down"></i>
		        </a>
		       
		        <div class="dropdown-menu" aria-labelledby="navbarDropdown" >
		        	@if(Auth::check())
		             <a class="dropdown-item" href="dangxuat" id="background1">Đăng Xuất</a>
		            @else 
		             <a class="dropdown-item" href="dangnhap" id="background1">Đăng Nhập</a>
		             @endif
		           <div class="dropdown-divider"></div>
		             <a class="dropdown-item" href="#" id="background1">Trang cá Nhân</a>
		          
		        </div>
            </li>
		</ul>
	</nav>
		 </div>
	</div>
