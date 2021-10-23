@extends('admin.layout.index')

@section('content')
  <!-- Page Content -->

        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Chủ đề
                            <small>Thêm</small>
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
                        <form action="admin/chude/them"  method="POST" enctype="multipart/form-data">
                        @csrf
                            <div class="form-group">
                                <label>Tên</label>
                                <input class="form-control" name="Ten" placeholder="Nhập tên chủ đề" />
                            </div>
                            <div class="form-group">
                                <label for="Hinh" >Hình ảnh</label>
                                <input id="Hinh" type="file" name="Hinh" class="form-control" onchange="readURL(this);"  >
                                <span class="custom-file-control"></span>
                                <img hidden src="#" id="one" display='none'>
                            </div>
                            <button type="submit" class="btn btn-default">Thêm</button>
                      
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
@endsection()

<script type="text/javascript">
            // đoạn code này hiển thị ảnh tải lên
            $('#one').hide();
            function readURL(input) {
                if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
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
