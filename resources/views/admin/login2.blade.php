<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('login/login.css')}}">
    <title>Document</title>
</head>
<body>
  <section>
    <div class="container">
      <div class="user signinBx">
        <div class="imgBx"><img src="https://raw.githubusercontent.com/WoojinFive/CSS_Playground/master/Responsive%20Login%20and%20Registration%20Form/img1.jpg" alt="" /></div>
        <div class="formBx login">
        <div class="thongbao">
          @if($errors->any())
            <div class = "alert alert-danger">
                                @foreach($errors->all() as $err)
                                    {{$err}}<br>   
                                @endforeach        
            </div>
             @endif

             @if(session('thongbao'))
                       
            {{session('thongbao')}}
                           
          @endif
        </div>
       
        <form role="form" action="{{route('user.postDangNhap')}}" method="POST">
        @csrf
            <h2>Sign In</h2>
            <input type="email" name="email" placeholder="E-mail" />
            <input type="password" name="password" placeholder="Password" />
            <input type="submit" name="" value="Login" />
            <p class="signup">
              Don't have an account ?
              <a href="{{route('user.getDangKy')}}" >Sign Up.</a>
            </p>
        </form>
        </div>
      </div>
      <!-- <div class="user signupBx">
        <div class="formBx">
          <form action="" onsubmit="return false;">
            <h2>Create an account</h2>
            <input type="text" name="" placeholder="Username" />
            <input type="email" name="" placeholder="Email Address" />
            <input type="password" name="" placeholder="Create Password" />
            <input type="password" name="" placeholder="Confirm Password" />
            <input type="submit" name="" value="Sign Up" />
            <p class="signup">
              Already have an account ?
              <a href="#" onclick="toggleForm();">Sign in.</a>
            </p>
          </form>
        </div>
        <div class="imgBx"><img src="https://raw.githubusercontent.com/WoojinFive/CSS_Playground/master/Responsive%20Login%20and%20Registration%20Form/img2.jpg" alt="" /></div>
      </div> -->
    </div>
  </section>
</body>
</html>