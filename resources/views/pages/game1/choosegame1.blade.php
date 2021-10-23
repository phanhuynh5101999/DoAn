@extends('pages.layout')
@section('content')
<link rel="stylesheet" href="{{asset('pages/css/choosegame1.css')}}">
<div class="header">
    <a href="{{ route('home')}}"><img id='back-button' src="{{asset('pages/image/back-button.png')}}" alt=""></a>
    <h2>Game</h2>
</div>
    <div class="container">
        <div class="wrap">
            <div class="row css_for_img_learn">
                <div class="col-6">
                    <div class="game">
                        <a href="{{route('pages.topicGame1')}}">
                            <div class="game__image">
                                <img src="{{asset('pages/image/random2.png')}}" alt="">
                            </div>
                            <div class="game__name">
                                Topic
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-6">
                    <div class="game">
                        <a href="{{route('pages.game1_1')}}">
                                <div class="game__image">
                                    <img src="{{asset('pages/image/topic.png')}}" alt="">
                                </div>
                                <div class="game__name">
                                    Random
                                </div>
                            </a>
                        </div>
                    </div>
            </div>
        </div>
    </div>
@endsection
