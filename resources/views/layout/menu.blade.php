<div class="row" >
   <div class="container">
      <div class="col-sm-12 menu" style="border-bottom: 2px solid red;" >
         <nav class="navbar navbar-expand-sm navbar-dark ">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar" >
            <i class="fas fa-bars" style="color: black;"></i>
            </button>
            <ul class="navbar-nav collapse navbar-collapse" id="collapsibleNavbar">
               <li class="nav-item" >
                  <a class="nav-link" href="trangchu" id="background"><i class="fas fa-home"></i></a>
               </li>
               @foreach($TheLoai as $TL)
               @if(count($TL->LoaiTin)>0)
               <li class="nav-item dropdown" >
                  <a class="nav-link cap1" id="background" style="color: #0099CC;">
                  <b>{{$TL->Ten}}</b></a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown" id="con">
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

<style type="text/css">
   .navbar-toggler{
      position: relative;
      left:93%;
     
   }
</style>
<script type="text/javascript">
   $(document).ready(function(){
   	$("ul li ").hover(function(){
   		$(this).find("#con").slideDown(300);
   	},function(){
   		$(this).find("#con").hide(300);
   	});
   });
</script>