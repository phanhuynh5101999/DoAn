@extends('pages.layout')
@section('content')

<link rel="stylesheet" href="{{asset('pages/css/main.css')}}">
<div class="header">
        <div class="container">
            <div class="row">
                <div class="col-4 col-md-3 col-lg-2">
                    <div class="header__logo">
                        <a href="">
                            <img src="{{asset('pages/image/logo_1.png')}}" alt="">
                        </a>
                    </div>               
                </div>
                <div class="col-4 col-md-5 col-lg-6">

                </div>
                <div class="col-4 col-md-4 col-lg-4">
                @if(Auth::check())
                    <div class="header__button">
                        <div class="header__button_signin">
                            <p>Hello: </p>
                            <a href="{{url('/pages/nguoidung')}}"> {{Auth::user()->name}}</a>
                        </div>
                        <div class="header__button__menu">
                            <a href="{{ route('user.getDangXuat')}}"> <i class="fa fa-sign-out" aria-hidden="true">Logout</i></a>
                        </div>
                       
                    </div>
                @endif
                </div>
            </div> 
        </div>
    </div>

    <div class="content">
        <div class="container">
            <div class="content__header">
                <div class="row">
                    <div class="col-lg-4 offset-lg-2 col-sm-6 col-xs-6">
                        <div class="content__header__item">
                            <a href="{{route('pages.chooseLesson')}}">
                                <h3>
                                    LEARN
                                </h3>
                                <div class="content__header__item__img">

                                    <img src="{{asset('pages/image/lesson.png')}}" alt="">
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 col-xs-6">
                        <div class="content__header__item">
                            <!-- <a href="{{route('pages.topicGame1')}}"> -->
                            <a href="{{route('pages.chooseGame1')}}">
                                <h3>
                                    GAME
                                </h3>
                                <div class="content__header__item__img">
                                    <img src="{{asset('pages/image/test.png')}}" alt="">
                                </div>
                            </a>
                        </div>  
                    </div>
                </div>
            </div>
        </div>
            <div class="content__mid">
                <img src="{{asset('pages/image/ground_still.png')}}" alt="">
            </div>
            <div class="content__bottom">
                <img class="content__bottom__wave" src="{{asset('pages/image/waves.png')}}" alt="">
                <!-- <img class= "content__bottom__balloons"src="./image/bottom.png" alt=""> -->
            </div>
        </div>
    

    <div class="footer">
        
    </div>

@endsection('content')