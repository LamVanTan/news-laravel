   @extends('admin.layout.index')

@section('noidung')

   <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Product
                            <small>Edit</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        @if(count($errors)>0)
                           <div class="alert alert-danger">
                               @foreach($errors->all() as $err)
                               {{$err}}<br>

                               @endforeach
                           </div>

                        @endif
                        
                        @if(session('loi'))
                             <div class="alert alert-success">
                               {{session('loi')}}
                           </div>
                        @endif
                        @if(session('thongbao'))
                           <div class="alert alert-success">
                               {{session('thongbao')}}
                           </div>
                        @endif

                         

                        <form action="admin/tintuc/sua/{{$TinTuc->id}}" method="POST" enctype="multipart/form-data">
                              <input type="hidden" name="_token" value="{{csrf_token()}}">

                               <div class="form-group">
                                <label>Thể Loại</label>
                                <select class="form-control" name="theloai" id="TheLoai">
                                   @foreach($TheLoai as $tl)
                                    <option  @if($TinTuc->LoaiTin->TheLoai->id==$tl->id)
                                      {{"selected"}}
                                      @endif
                                     value="{{$tl->id}}">{{$tl->Ten}}</option>
                                    @endforeach
                                </select>
                            </div>

                             <div class="form-group">
                                <label>Loại Tin</label>
                                <select class="form-control" name="loaitin" id="LoaiTin">
                                   @foreach($LoaiTin as $lt)
                                    <option @if($TinTuc->idLoaiTin==$lt->id)
                                          {{"selected"}}
                                          @endif
                                    value="{{$lt->id}}">{{$lt->Ten}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Tiêu Đề</label>
                                <textarea class="form-control"rows="3" name="tieude" >{{$TinTuc->TieuDe}}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Hình Ảnh</label>
                                <input type="file" name="fImages" >
                                <img src="img/{{$TinTuc->Hinh}}" width="200" height="200">
                            </div>
                            <div class="form-group">
                                <label>Tóm Tắt</label>
                                <textarea class="form-control" rows="3" name="tomtat" >{{$TinTuc->TomTat}}</textarea>
                            </div>

                            <div class="form-group">
                                <label>Nội Dung</label>
                                <textarea class="form-control" rows="15" name="noidung" >{{$TinTuc->NoiDung}}</textarea>
                            </div>
                            
                            <div class="form-group">
                                <label>Nổi Bật</label>
                                <label class="radio-inline">
                                    <input name="noibat" value="0"

                                     @if($TinTuc->NoiBat == 0)
                                     {{"checked"}}
                                     @endif
                                     type="radio">Không
                                </label>
                                <label class="radio-inline">
                                    <input name="noibat" value="1" 
                                     @if($TinTuc->NoiBat== 1)
                                     {{"checked"}}
                                     @endif
                                     type="radio">Có
                                </label>
                            </div>
                            <button type="submit" class="btn btn-default">Cập Nhập</button>
                            <button type="reset" class="btn btn-default">Làm Mới</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
@endsection

@section('script')
  <script>
      $(document).ready(function(){
         $("#TheLoai").change(function(){
              var idTheLoai= $(this).val();
              $.get("admin/ajax/loaitin/"+idTheLoai,function(data){
                $("#LoaiTin").html(data);
              })
         });
      });
  </script>
@endsection