@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Chủ đề
                            <small>Danh sách</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    
                    <div class="alert alert-success">
                        @if(session('thongbao'))
                            {{session('thongbao')}}
                         @endif
                    </div>
                    
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Tên</th>
                                <th>Email</th>   
                                <th>Quyền</th>
                                <th>Sửa</th>
                                <th>Xóa</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($user as $item):
                            <tr class="odd gradeX" align="center">
                                <td>{{$item->id}}</td>
                                <td>{{$item->name}}</td> 
                                <td>{{$item->email}}</td>
                                <td>
                                    @if($item->quyen == 1)
                                    {{"admin"}}
                                    @else 
                                    {{"user"}}
                                    @endif
                                </td>                                            
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{ route('user.getSua', ['id' => $item->id]) }}"> Sửa</a></td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="{{ route('user.getXoa', ['id' => $item->id]) }}">Xóa</a></td>
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
