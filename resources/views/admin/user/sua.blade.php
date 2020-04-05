   @extends('admin.layout.index')

@section('noidung')

  <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">User
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
                        <form action="admin/user/sua/{{$user->id}}" method="POST">

                            <input type="hidden" name="_token" value="{{csrf_token()}}">

                            <div class="form-group">
                                <label>Username</label>
                                <input class="form-control" name="txtUser" value="{{$user->name}}" />
                            </div>
                            <div class="form-group">
                                
                                <input type="checkbox" id="changePassword" name="checkboxpass">
                                <label> Đổi Mật Khẩu</label>
                            </div>
                            <div class="form-group">
                                <label>Mật Khẩu</label>
                                <input type="password" class="form-control password" name="txtPass" placeholder="Nhập Mật Khẩu"  disabled="" />
                            </div>
                            <div class="form-group">
                                <label>Nhập Lại Mật Khẩu</label>
                                <input type="password" class="form-control password" name="txtRePass" placeholder="Nhập Lại Mật Khẩu" disabled />
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" name="txtEmail" value="{{$user->email}}" readonly="" />
                            </div>
                            <div class="form-group">
                                <label>User Level</label>
                                <label class="radio-inline">
                                    <input name="quyen"
                                    @if($user->quyen== 0)
                                    {{"checked"}}
                                    @endif
                                     value="0" type="radio">Thường
                                </label>
                                <label class="radio-inline">
                                    <input name="quyen" 
                                    @if($user->quyen== 1)
                                    {{"checked"}}
                                    @endif
                                     value="1" type="radio">Admin
                                </label>
                            </div>
                            <button type="submit" class="btn btn-default">User Edit</button>
                            <button type="reset" class="btn btn-default">Reset</button>
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
       $("#changePassword").change(function(){
           if($(this).is(":checked"))
           {
                $(".password").removeAttr('disabled')
           }
           else{
               $(".password").attr('disabled','');
           }
       });
    });
   
 </script>

@endsection


