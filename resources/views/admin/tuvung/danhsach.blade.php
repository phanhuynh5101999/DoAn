@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Từ vựng
                            <small>Danh sách</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    @if(session('thongbao'))
                    <div class="alert alert-success">
                        {{session('thongbao')}}
                    </div>
                    @endif
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Tên</th>   
                                <th>Chủ đề</th>   
                                <th>Hình ảnh</th> 
                                <th>Âm thanh</th> 
                                <th>Sửa</th>
                                <th>Xóa</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tuvung as $item)
                            <tr class="odd gradeX" align="center">
                                <td>{{$item->id}}</td>
                                <td>{{$item->ten}}</td>  
                                <td>{{$item->chude->ten}}</td> 
                                <td><img width="100px" src="upload/image/{{$item->hinhanh}}" alt=""></td>
                                <td>
                                <audio controls>
                                    <source src="upload/audio/{{$item->amthanh}}" type="audio/ogg" >
                                   
                                    
                                </audio>
                                </td>                                   
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/tuvung/sua/{{$item->id}}">Sửa</a></td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/tuvung/xoa/{{$item->id}}">Xóa</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
@endsection
