@extends('pages.layout')
@section('content')
<link rel="stylesheet" href="{{asset('pages/css/lesson.css')}}">
<div class="wrap">
    <div class="container-fluid">
        <!-- <div class="row">
                <div class="col-12"> -->
        
        <div class="content">
            <div class="content__header">
                <a href="{{ route('pages.chooseLesson')}}"><img id='back-button' src="{{asset('pages/image/back-button.png')}}" alt=""></a>
                <h3><span id='topic_name'> Lesson Again </span>  </h3>
                <h4>Number of words:  {{$count}}</h4>
            </div>

            <ul class="tuvung">
                @foreach($tuvung as $item)
                <li class='item'>
                    <div class="content__image">
                        <img src="{{asset('upload/image').'/'.$item->hinhanh}}" alt="">
                    </div>
                    <div class="content__word">
                        <p>{{$item->ten}}</p>
                    </div>
                    <!-- <audio id="my_audio" src="{{asset('upload/audio').'/'.$item->amthanh}}" loop="loop"></audio> -->

                    <audio id="myAudio" controls hidden>
                        <source src="{{asset('upload/audio').'/'.$item->amthanh}}" type="audio/mpeg">
                        Your browser does not support the audio element.
                    </audio>
                </li>

                <!-- <li  class='item'>    
                            <div class="content__image">
                                <img src="{{asset('pages/image/111220200443395facbd7bb1930unnamed.jpg')}}" alt="">
                            </div>
                            <div class="content__word">
                                <p>2</p>
                            </div>
                        </li>
                        <li  class='item'>    
                            <div class="content__image">
                                <img src="{{asset('pages/image/110320201006555fa12bbf143e288237728_638481973637771_4099828652361908224_o.jpg')}}" alt="">
                            </div>
                            <div class="content__word">
                                <p>3</p>
                            </div>
                        </li> -->
                @endforeach
            </ul>

        </div>

        <!-- </div>
            </div> -->
    </div>

</div>


<div class="button">

    <div class="button__item prev">
        <!-- <a href=""> -->
        <img src="{{asset('pages/image/arrow_left.png')}}" alt="">
        <!-- </a> -->
    </div>
    <div class="button__item">
        <div class="replay">
            <img src="{{asset('pages/image/replay.png')}}" alt="">
            <!-- <i class="far fa-camera"></i> -->
        </div>
    </div>
    <div class="button__item next">
        <!-- <a href=""> -->
        <img src="{{asset('pages/image/arrow_right.png')}}" alt="">
        <!-- </a> -->
    </div>
</div>


@endsection


@section('script')


<script>
var audioElement = document.createElement('audio');
$(document).ready(function() {
    $(".item").first().addClass('active')
    $('.prev').click(function() {

        var cur = $('.item').index($('.item.active'));
        if (cur != 0) {
            $('.item').removeClass('active');
            $('.item').eq(cur - 1).addClass('active');
            audioElement.setAttribute('src', $('.item.active audio source').attr('src'));
            audioElement.play();
        }
    });
    $('.next').click(function() {

        var cur = $('.item').index($('.item.active'));
        if (cur != $('.item').length - 1) {
            $('.item').removeClass('active');
            $('.item').eq(cur + 1).addClass('active');
            audioElement.setAttribute('src', $('.item.active audio source').attr('src'));
            audioElement.play();
        }
    });
    var $val = $('.item.active audio source').attr('src');


    // $('#myaudio').autoplay();

    audioElement.setAttribute('src', $val);





    $('.replay').click(function() {
        audioElement.setAttribute('src', $('.item.active audio source').attr('src'));
        // audioElement.load();
        audioElement.play();

    });


    // $('#restart').click(function() {
    //     audioElement.currentTime = 0;
    // });




})
</script>
@endsection