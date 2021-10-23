@extends('pages.layout')
@section('content')
<link rel="stylesheet" href="{{asset('pages/css/game1.css')}}">
<div class="message">

</div>


<div class="header">
                <a href="{{ route('pages.topicGame1')}}"><img id='back-button' src="{{asset('pages/image/back-button.png')}}" alt=""></a>
                <h2>Topic: <span id='topic_name'> {{$chude->ten}} </span>  </h2>
            </div>
<div class="answer">
    <div class="row">
        <div class="col-9">
            <div class="row">
                <div style="text-align: center; width: 450px; height: 350px;" class="col-sm-6 f" id="{{$tuvung3['id']}}">
                <img style="width: 375px;height: 300px; border: 10px outset #8FBC8F;"  src="{{ asset('upload/image/'.$tuvung3->hinhanh) }}"></div>
                        @php $tukhac1= $chude->tuvung->whereNotIn('id', $tuvung3['id']);
                        $tukhac = $tukhac1->shuffle()->take(3); @endphp
                @foreach($tukhac as $item)
                <div style="text-align: center; width: 450px; height: 350px;"  class="col-sm-6 f " style="color:red" id=" {{ $item['id'] }}">
                <img style="width: 375px;height: 300px; border: 10px outset #8FBC8F;"   src="{{ asset('upload/image/'.$item->hinhanh) }}"></div>

                @endforeach
            </div>
        </div>
        <div class="col-3">
            <div class="speaker">
                <img  src="{{asset('pages/image/speaker.png')}}" alt="">
            </div>
            <div class="word" id=" {{$tuvung3['id']}}">
                {{$tuvung3['ten']}}
            </div>

        </div>

        <input type="hidden" name="audio" value="{{ asset('upload/audio/'.$tuvung3->amthanh) }}">
        <!-- <div class="col-6 col-sm-3 col-lg-6 f" >B</div>


  <div class="w-100"></div>

  <div class="col-6 col-sm-3 col-lg-6 f" >C</div>
  <div class="col-6 col-sm-3 col-lg-6 f" >D</div> -->

    </div>


</div>
@endsection
@section('script')

<script>
// đảo câu trả lời
var cards = $(".col-sm-6.f");
for (var i = 0; i < cards.length; i++) {
    var target = Math.floor(Math.random() * cards.length - 1) + 1;
    var target2 = Math.floor(Math.random() * cards.length - 1) + 1;
    cards.eq(target).before(cards.eq(target2));
}



//chọn đáp an
$(document).ready(function() {
    //click anh
    $(".col-sm-6.f").click(function() {
        // alert($(this).attr('id'));
        var id = $(this).attr('id');
        var idTuVung = $('.word').attr('id');

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "post",
            url: "{{ URL::route('ajax.game1') }}",
            data: {
                id: id,
                idTuVung: idTuVung
            },
            success: function(data) {
                $('.message').html(data);
                if ($("input[name=check]").val() == 1) {

                    swal({
                        title: "Success!",
                        text: "Click OK to next question",
                        type: "success",
                    }, function() {
                        // let countResult = localStorage.getItem("countResult");
                        // if(countResult) {
                        //     localStorage.setItem("countResult", parseInt(countResult)+1)
                        // } else {
                        //     localStorage.setItem("countResult", 1);
                        // }
                        parent.window.location.reload();
                    });
                } else if ($("input[name=check]").val() == 0) {

                    Swal.fire({
                        title: "false",
                        icon: 'error'

                    })

                }

            }

        });

    });
    var audioElement = document.createElement('audio');
    // var $val = $("input[name=audio]").val();
    // audioElement.setAttribute('src', $val);
    //click loa
    $('.speaker').click(function() {

        var $val = $("input[name=audio]").val();
        audioElement.setAttribute('src', $("input[name=audio]").val());
        // audioElement.setAttribute('src',  $val);
        audioElement.play();
        console.log($val);
    })
});
</script>


@endsection
