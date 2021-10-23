@extends('admin.layout.index')

@section('content')
  <!-- Page Content -->

        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">User
                            <small>Sửa</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                    @if($errors->any())
                        <div class = "alert alert-danger">
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
                        <form action="{{ route('user.postSua', ['id' => $user->id]) }}"  method="POST" enctype="multipart/form-data">
                        @csrf
                            <div class="form-group">
                                <label>Tên</label>
                                <input class="form-control" name="Ten" placeholder="Nhập tên chủ đề" value='{{$user->name}}'/>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input readonly type="email"  class="form-control" name="Email" placeholder="Nhập địa chỉ Email" value='{{$user->email}}' />
                            </div>
                            <div class="form-group">
                            <input type="checkbox" id="changePassword" name="changePassword">
                                <label>Đổi mật khẩu</label>
                                <input disabled="" type="password" class="form-control password" name="Password" placeholder="Nhập mật khẩu" />
                            </div>
                            <div class="form-group">
                                <label>Nhập lại Mật khẩu</label>
                                <input disabled="" type="password" class="form-control password" name="PasswordAgain" placeholder="Nhập lại mật khẩu" />
                            </div>
                            <div class="form-group">
                                <label>Quyền người dùng </label>
                                <label class="radio-inline">
                                    <input disabled name="Quyen" value="0" type="radio"  @if($user->quyen==0) {{'checked'}} @endif  >User
                                </label>
                                <label class="radio-inline">
                                    <input disabled name="Quyen" value="1"  type="radio"  @if($user->quyen==1) {{'checked'}} @endif >Admin
                                </label>
                                
                            </div>
                            <button type="submit" class="btn btn-default">Sửa</button>
                          
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
@endsection()

@section('script')
    <script>
        $(document).ready(function(){
            $('#changePassword').change(function(){
                if($(this).is(":checked"))
                {
                    $('.password').removeAttr('disabled');
                }
                else
                {
                    $('.password').attr('disabled','');
                }
            });
        });
    </script>
@endsection