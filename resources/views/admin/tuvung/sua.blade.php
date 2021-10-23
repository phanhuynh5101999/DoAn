@extends('admin.layout.index')

@section('content')
  <!-- Page Content -->

        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Từ vựng
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
                        <form action="{{ route('tuvung.postSua', ['id' => $tuvung->id]) }}"  method="POST" enctype="multipart/form-data">
                        @csrf
                            <div class="form-group">
                                <label>Tên chủ đề</label>
                                <select class="form-control" name ="ChuDe">
                                    @foreach($chude as $item)
                                    <option
                                        @if($tuvung->idchude == $item->id)
                                            {{'selected'}}
                                        @endif
                                    value="{{$item->id}}">{{$item->ten}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Tên</label>
                                <input class="form-control" name="Ten" placeholder="Nhập tên chủ đề" value='{{$tuvung->ten}}'/>
                            </div>
                            <div class="form-group">
                                <label for="Hinh" >Hình ảnh</label>
                                <input  id="Hinh" type="file" name="Hinh" class="form-control"  onchange="readURL(this);"  >
                                <span class="custom-file-control"></span>
                                <img id ="old_image" src="upload/image/{{$tuvung->hinhanh}}" width="300px" alt="">
                                <input hidden name="image_old" value = "{{$tuvung->hinhanh}}">
                                <img src="#" id="one" hidden >
                            </div>
                            <div class="form-group">
                                <label for="AmThanh" >Âm thanh</label>
                                <input id="AmThanh" type="file" name="AmThanh" class="form-control"  >
                                <input hidden name="audio_old" value ="{{$tuvung->amthanh}}">
                                <audio id="old_audio" controls>
                                    <source src="upload/audio/{{$tuvung->amthanh}}" id="src2" />
                                </audio>
                                <audio id="audio" hidden controls>
                                    <source src="" id="src" />
                                </audio>
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



        <script type="text/javascript">
            // đoạn code này hiển thị ảnh tải lên
            $('#one').hide();
            function readURL(input) {
                if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#old_image').hide();
                    $('#one').show();
                    $('#one')
                    .attr('src', e.target.result)
                    .width(300)
                    // .height(200);
                };
                reader.readAsDataURL(input.files[0]);
                }
            }
        </script>

        <script>
        //hien thi audio
          function handleFiles(event) {
                var files = event.target.files;
                $('#old_audio').hide();
                $('#audio').show();
                 $("#src").attr("src", URL.createObjectURL(files[0]));
                 document.getElementById("audio").load();
            }
            document.getElementById("AmThanh").addEventListener("change", handleFiles, false);
        </script>
@endsection()