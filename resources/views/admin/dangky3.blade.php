<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('login/login3.css')}}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>

    <div class="box-logo">
        <button class='btn-big'><span>E</span></button>
        <button class='btn-big'><span>n</span></button>
        <button class='btn-big'><span>g</span></button>
        <button class='btn-big'><span>l</span></button>
        <button class='btn-big'><span>i</span></button>
        <button class='btn-big'><span>s</span></button>
        <button class='btn-big'><span>h</span></button>
        <br>
        <button class="btn-small"><span>w</span></button><button class="btn-small"><span>i</span></button><button
            class="btn-small"><span>t</span></button><button class="btn-small"><span>h</span></button>&emsp;<button
            class="btn-small"><span>k</span></button><button class="btn-small"><span>i</span></button><button
            class="btn-small"><span>d</span></button><button class="btn-small"><span>s</span></button>
    </div>
    <div class="box-form">
        
        @if($errors->any())
        <span class="notification wrong "
            style="width: 240px; top: -104px;"> @foreach($errors->all() as $err)
                {{$err}}<br>   
        @endforeach </span>
        
         @endif

         @if(session('thongbao'))
         <span class="notification correct"
         style="width: 240px; top: -48px;">
       
                   
         {{session('thongbao')}}
                    
        
        </span>
        @endif
      

        <form action="{{route('user.postDangKy')}}" method="POST">
         @csrf
            <input type="text" name="Ten" placeholder="Username" value=""><br>
            <input type="text" name="Email" placeholder="Email Address" value=""><br>
            <input type="password" name="Password" placeholder="Password, min 6 chars" value=""><br>
            <input type="password" name="PasswordAgain" placeholder="Confirm Password"><br>
            <button type="submit" class="btn-auth"><span>SIGN UP</span></button>
        </form>
         <a style="color: white" href="{{url('dangnhap')}}">Already have account</a>
    </div>





    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>

</body>

</html>