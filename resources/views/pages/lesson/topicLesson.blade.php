@extends('pages.layout')
@section('content')
    <link rel="stylesheet" href="{{asset('pages/css/topic.css')}}">

    <div class="header">
        <a href="{{ route('pages.chooseLesson')}}"><img id='back-button' src="{{asset('pages/image/back-button.png')}}" alt=""></a>
        <h2 style="font-weight: bold; font-size: 35px">TOPIC</h2>

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
                        <h4 class="modal-title" id="exampleModalLabel">Intruction</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div style="font-size: 24px ; text-align: left; " class="modal-body">
                        B1: Có tất cả 14 chủ đề, bạn có thể chọn vào chủ đề mà mình muốn học.<br>
                        B2: Khi chọn xong chủ đề, bạn có thể nhấn "►"  để chuyển sang từ khác hoặc nhấn "◄" để quay về từ phía trước.
                        Bạn có thể nghe lại bằng cách nhấn "↻". <br>
                        B3: Nếu bạn muốn thay đổi học chủ đề khác vui lòng nhấn "<nav style="display: inline; font-size: 35px; line-height: 0.5">⤺</nav>" để quay lại chọn 1 trong 14 chủ đề bạn muốn học.<br>
                        Xin cảm ơn, chúc bạn học vui vẻ và đạt kết quả tốt.
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="content">
        <div class="container">
            <div class="row">
                @foreach($topic as $item)
                    <div class="col-sm-3">
                        <a href="{{ route('pages.lesson', ['id' => $item->id])}}">
                            <div class="item">
                                <div class="item__image"
                                     style="background-image: url('{{asset('upload/image').'/'.$item->hinhanh}}') ">

                                </div>
                                <p>{{$item->ten}}</p>
                            </div>

                        </a>
                    </div>

                @endforeach
            </div>

        </div>
    </div>

@endsection
