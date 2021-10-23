@extends('pages.layout')
@section('content')
<link rel="stylesheet" href="{{asset('pages/css/game1_1.css')}}">
<script>
window.urlChooseGame = "<?php echo route('pages.chooseGame1')  ?>";
</script>
<style>
.question {
    display: none;
}

.question:first-child {
    display: block;
}

body {
    background-attachment: fixed;
}

.modal-dialog {
    max-width: 800px;
}
</style>
{{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
  Launch demo modal
</button> --}}
<div class="container-fluid">
<!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Result</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

            </div>
            <div class="modal-body">
                <div class="result">
                {{-- <div class="item row">
                        <div class="item__image col-md-4">
                            <img src="{{asset('upload/image/animals-bat.gif')}}" alt="">
                        </div>
                        <div class="item__word col-md-3">bat</div>

                        <audio  class="item__audio  col-md-4"  controls>
                            <source src="" type="audio/ogg">
                        </audio>
                        <i style='color: #b8daff' class="fa fa-check fa-2x col-md-1" aria-hidden="true"></i>
                    </div>
                </div>

                <div class="item row">
                    <div class="item__image col-md-4">
                        <img src="{{asset('upload/image/animals-bat.gif')}}" alt="">
                    </div>
                    <div class="item__word col-md-3">bat</div>

                    <audio  class="item__audio  col-md-4"  controls>
                        <source src="" type="audio/ogg">
                    </audio>
                    <i style='color: #f5c6cb' class="fa fa-times fa-2x col-md-1" aria-hidden="true"></i>
                </div> --}}


                <div class="name alert alert-success">Correct Word</div>
                <div class="result__true"></div>
                <div class="name alert alert-danger">Wrong Word</div>
                <div class="result__false"></div>
            </div>

            </div>
            <div class="modal-footer">

                <input type="button" class="btn btn-primary"
                    onclick="location.href='<?php echo route('pages.game1_1') ?>'" value="Play again" />
            </div>
        </div>
    </div>
</div>
<div class="message">

</div>

<div class="header">
    <a href="{{ route('pages.chooseGame1')}}"><img id='back-button' src="{{asset('pages/image/back-button.png')}}" alt=""></a>
    <h2>Random</h2>

    <!-- Button trigger modal -->
    <button style="font-size: 25px; font-weight: bold; color: #ffffff" type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal">
        Intruction
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="width: 600px">
                <div class="modal-header">
                    <h4 style="color: black" class="modal-title" id="exampleModalLabel">Intruction</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div style="font-size: 24px ; text-align: left; color: black" class="modal-body">
                    B1: Hệ thống sẽ lấy ngẫu nhiên 4 hình ảnh từ 14 chủ đề và cho trước từ gợi ý của đáp án đúng.<br>
                    B2: Nhiệm vụ của bạn là chọn vào hình ảnh bạn cho là đúng.
                    Sau khi chọn làm xong 20 câu hỏi hệ thống sẽ chấm điểm, chỉ ra số câu đúng và số câu sai.
                    Với những câu làm sai bạn có thể xem, nghe lại ở phần học lại.<br>
                    B3: Bạn có thể nghe lại bằng cách nhấn vào biểu tượng loa ở góc phải màn hình. <br>
                    Xin cảm ơn, chúc bạn học vui vẻ và đạt kết quả tốt.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

</div>
<input id='count' type="hidden" value="<?php echo count($arrQuestion) ?>">
<div class="answer">

    @foreach($arrQuestion as $key => $arr)
    <div class="question">
        <h3 class="ind"> Question: {{$key + 1}}</h3>
        <div class="row">
            <div class="col-9">
                <div class="row">
                    @foreach($arr as $tv )

                    <div class="col-sm-6 f " style="color:red; text-align: center; " id=" {{ $tv['id'] }}">
                        <img style="width: 450px; height: 300px; border: 10px outset #8FBC8F;"
                            src="{{ asset('upload/image/'.$tv['hinhanh']) }}">


                    </div>
                    @endforeach
                </div>
                <!--
                <div class="click w-100 text-center">
                    @if($key == (count($arrQuestion) - 1))
                    <button class="btn btn-show-result">Xem ket qua</button>
                    @else
                    <button class="btn btn-click">Click</button>
                    @endif

                </div> -->
            </div>

            <div class="col-3">
                <?php $data = $arr[rand(0, 3)] ?>
                <div class='word' id="{{$data['id']}}">{{$data['ten']}}</div>
                <input id='audio' type="hidden" name="audio" value="{{ asset('upload/audio/'.$data['amthanh']) }}">
                <input id='image__hidden' type="hidden" name="audio"
                    value="{{ asset('upload/image/'.$data['hinhanh']) }}">
                <div class="speaker">
                    <img src="{{asset('pages/image/speaker.png')}}" alt="">
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
</div>
@endsection
@section('script')

<script>


//chọn đáp an
$(document).ready(function() {
    var countResult = localStorage.getItem("countResult");
    var arr_resultTrue = JSON.parse(localStorage.getItem("arrTrue"));
    var arr_resultFalse = JSON.parse(localStorage.getItem("arrFalse"));
    var arr_Answer = JSON.parse(localStorage.getItem("arrAnswer"));
    //
    if (countResult) {
        localStorage.removeItem("countResult");
    }
    if (arr_resultTrue) {
        localStorage.removeItem("arrTrue");
    }
    if (arr_resultFalse) {
        localStorage.removeItem("arrFalse");
    }
    if (arr_resultFalse) {
        localStorage.removeItem("arrFalse");
    }
    if (arr_Answer) {
        localStorage.removeItem("arrAnswer");
    }


    var total = $('#count').val();


    //click anh
    var resultTrue = 0;
    var count = 0;
    var arrQuestionTrue = [];
    var arrQuestionFalse = [];
    var arrAnswer = [];
    $(".col-sm-6.f > img").click(function() {
        var that = $(this);
        var id = $(this).parent().attr('id');

        count += 1;
        // var count =$(this).closest('.question').find('#count').attr('id');
        var idTuVung = $(this).closest('.question').find('.word').attr('id');
        var audio = $(this).closest('.question').find('#audio').val();
        var word = $(this).closest('.question').find('.word').text();
        var image = $(this).closest('.question').find('#image__hidden').val();


        // console.log(audio);
        // console.log('id: '+ id);
        // console.log('word: '+ idTuVung);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        function checkTotal() {
            var countResult =  parseInt(localStorage.getItem("countResult")) ;

            if ($("input[name=isTotal]").val() == 1) {
                countResult = countResult ? countResult : 0;
                swal({
                    title: "Finish!",
                    text: "Number of correct sentences: " +countResult+"/20" ,
                    type: "success",
                });
                $('#exampleModalLong').modal('show');
                var resultTrue = $('.result__true');
                var resultFalse = $('.result__false');
                // var arr_resultTrue = JSON.parse(localStorage.getItem("arrTrue"));

                var arr_Answer = JSON.parse(localStorage.getItem("arrAnswer"));
                console.log(arr_Answer);

                if (arr_Answer) {
                    for (var i = 0; i < arr_Answer.length; i++) {
                    if(arr_Answer[i].result == 1){
                        resultTrue.append(
                            `<div class="item row">
                        <div class="item__image col-md-4">
                            <img style="height: 100px" src="${arr_Answer[i].image}" alt="">
                        </div>
                        <div class="item__word col-md-3">${arr_Answer[i].word}</div>

                        <audio  class="item__audio  col-md-5"  controls>
                            <source src="${arr_Answer[i].audio}" type="audio/ogg">

                        </audio>
                        <input id='id_arr_Answer' type="hidden" value='${arr_Answer[i].id}' >

                    </div>`);

                    }


                        else if (arr_Answer[i].result == 0) {
                         resultFalse.append(
                            `<div class="item row">
                        <div class="item__image col-md-4">
                            <img style="height: 100px" src="${arr_Answer[i].image}" alt="">
                        </div>
                        <div class="item__word col-md-3">${arr_Answer[i].word}</div>

                        <audio  class="item__audio  col-md-5"  controls>
                            <source src="${arr_Answer[i].audio}" type="audio/ogg">

                        </audio>
                        <input id='id_arr_Answer' type="hidden" value='${arr_Answer[i].idTuVung}' >
                    </div>`);
                        }
                    }

                    var arr_Answer = JSON.stringify(arr_Answer);
                    $.ajax({
                        type: "post",
                        url: "{{ URL::route('ajax.game1_1_1') }}",
                        data:{
                            arr_Answer: arr_Answer
                        },

                    })


                }
                // else{
                //     resultTrue.append(`<h5>No Correct Results !</h5>`);
                // }


                // var resultFalse = $('.result__false');
                // var arr_resultFalse = JSON.parse(localStorage.getItem("arrFalse"));
                // console.log(arr_resultFalse);
                // if (arr_resultFalse) {
                //     for (var i = 0; i < arr_resultFalse.length; i++) {
                //         console.log(arr_resultFalse[i]);
                //         resultFalse.append(
                //             `<div class="item row">
                //         <div class="item__image col-md-4">
                //             <img src="${arr_resultFalse[i].image}" alt="">
                //         </div>
                //         <div class="item__word col-md-3">${arr_resultFalse[i].word}</div>

                //         <audio  class="item__audio  col-md-5"  controls>
                //             <source src="${arr_resultFalse[i].audio}" type="audio/ogg">

                //         </audio>
                //     </div>`);
                //     }
                // }
                // else{
                //     resultFalse.append(`<h5>No Wrong Results! </h5>`);
                // }



            }
            else {
                that.closest('.question').hide().next().show();
            }
            $('#exampleModalLong').on('hidden.bs.modal', function(e) {
                window.location.href = window.urlChooseGame;
            })

        }

        $.ajax({
            type: "post",
            url: "{{ URL::route('ajax.game1_1') }}",
            data: {
                id: id,
                idTuVung: idTuVung,
                count: count,
                total: total
            },
            success: function(data) {
                $('.message').html(data);
                if ($("input[name=check]").val() == 1) {
                    resultTrue++;
                    var countResult = localStorage.getItem("countResult");
                    if (countResult) {
                        localStorage.setItem("countResult", parseInt(
                            countResult) + 1)
                    } else {
                        localStorage.setItem("countResult", 1);
                    }
                    // arrQuestionTrue.push({
                    arrAnswer.push({
                        idTuVung: idTuVung,
                        audio: audio,
                        image: image,
                        word: word,
                        result: 1
                    });
                    // localStorage.setItem("arrAnswer", JSON.stringify(
                    //     // arrQuestionTrue));
                    //     arrAnswer));
                    localStorage.setItem("arrAnswer", JSON.stringify(arrAnswer));
                    checkTotal();
                } else if ($("input[name=check]").val() == 0) {
                    // arrQuestionFalse.push({
                        arrAnswer.push({
                        idTuVung: idTuVung,
                        audio: audio,
                        image: image,
                        word: word,
                        result: 0
                    });
                    // localStorage.setItem("arrFalse", JSON.stringify(arrQuestionFalse));
                    // localStorage.setItem("arrAnswer", JSON.stringify(arrAnswer));
                    localStorage.setItem("arrAnswer", JSON.stringify(arrAnswer));
                    checkTotal();
                };




            }

        });

    });

    // var $val = $("input[name=audio]").val();
    // audioElement.setAttribute('src', $val);
    //click loa
    $('.speaker').click(function() {
        // $value = $(this).closest('.question').find('#audio').val();

        var $val = $(this).closest('.question').find('#audio').val();
        var audioElement = document.createElement('audio');

        audioElement.setAttribute('src', $(this).closest('.question').find('#audio').val());
        // audioElement.setAttribute('src',  $val);
        audioElement.play();
        // console.log($val);
    })

    // $('#exampleModalLong').on('hidden.bs.modal', function(e) {
    //     console.log(1);
    //     window.location.href = window.urlChooseGame;
    // })

    //ket qua
    // let arr = localStorage.getItem("arrTrue");




});
</script>


@endsection
