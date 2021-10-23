@extends('pages.layout')
@section('content')


<div class="container">
    <h1>Edit Profile</h1>
  	<hr>
	<div class="row">
      <!-- edit form column -->
      <div class="col-md-9 personal-info">
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
        <h3>Personal info</h3>
        
        <form action="{{route('pages.postNguoiDung')}}"  method="POST" enctype="multipart/form-data">
        @csrf
          <div class="form-group">
            <label class="col-lg-3 control-label">Name</label>
            <div class="col-lg-8">
              <input class="form-control" name="Ten" placeholder="Name" value='{{$user->name}}'/>
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Email</label>
            <div class="col-lg-8">
              <input readonly type="email"  class="form-control" name="Email" placeholder="Email" value='{{$user->email}}' />
            </div>
          </div>
       
          <div class="form-group">
            <label class="col-md-3 control-label">
              <input type="checkbox" id="changePassword" name="changePassword">
              <label>Đổi mật khẩu</label>
              </label>
              <div class="col-md-8">
              <input disabled="" type="password" class="form-control password" name="Password" placeholder="Password" />
            </div>
 
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label">Confirm password:</label>
            <div class="col-md-8">
            <input disabled="" type="password" class="form-control password" name="PasswordAgain" placeholder="Confirm password" />
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label"></label>
            <div class="col-md-8">
              <input type="submit" class="btn btn-primary" value="Save Changes">
              <span></span>
            </div>
          </div>
        </form>
      </div>
  </div>
</div>
<hr>

@endsection

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