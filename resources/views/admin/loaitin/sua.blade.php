   @extends('admin.layout.index')

@section('noidung')

   <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Loại Tin
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

                        @if(session('thongbao'))
                           <div class="alert alert-success">
                               {{session('thongbao')}}
                           </div>
                        @endif
                        <form action="admin/loaitin/sua/{{$sualoaitin->id}}" method="POST">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="form-group">
                                <label>Thể Loại</label>
                                <select class="form-control" name="theloai">
                                    @foreach($theloai as $tl)
                                    <option @if($sualoaitin->idTheLoai==$tl->id)
                                          {{"selected"}}
                                          @endif
                                      value="{{$tl->id}}">{{$tl->Ten}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Tên Loại Tin</label>
                                <input class="form-control" name="txtCateName" placeholder="Điền Vào Đây"
                                  value="{{$sualoaitin->Ten}}" />
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