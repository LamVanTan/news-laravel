 @extends('admin.layout.index')

@section('noidung')

        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Tin Tức
                            <small>Danh Sách</small>
                        </h1>
                         @if(session('thongbao'))
                           <div class="alert alert-success">
                               {{session('thongbao')}}
                           </div>
                        @endif
                    </div>
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Tiêu Đề</th>
                                <th>Tóm Tắt</th>
                                <th>Nội Dung</th>
                                <th>Hình Ảnh</th>
                                <th>Nổi Bật</th>
                                <th>Số Lượt Xem</th>
                                <th>Thể Loại</th>
                                <th>Loại Tin</th>
                                 <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($listTinTuc as $tt)
                            <tr class="odd gradeX" align="center">
                                <td>{{$tt->id}}</td>
                                <td>{{$tt->TieuDe}}</td>
                                <td>{{$tt->TomTat}}</td>
                                <td>{{$tt->NoiDung}}</td>
                                <td><img src="img/{{$tt->Hinh}}" width="100" height="100"></td>
                                <td>{{$tt->NoiBat}}</td>
                                <td>{{$tt->SoLuotXem}}</td>
                                <td>{{$tt->LoaiTin->TheLoai->Ten}}</td>
                                <td>{{$tt->LoaiTin->Ten}}</td>
                                <td class="center">
                                    <i class="fa fa-trash-o  fa-fw"></i><a href="admin/tintuc/xoa/{{$tt->id}}"> Delete</a>
                                </td>
                                <td class="center">
                                    <i class="fa fa-pencil fa-fw"></i> <a href="admin/tintuc/sua/{{$tt->id}}">Edit</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>

@endsection