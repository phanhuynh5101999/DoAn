<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li class="sidebar-search">
                <!-- <div class="input-group custom-search-form">
                    <input type="text" class="form-control" placeholder="Search...">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="button">
                            <i class="fa fa-search"></i>
                        </button>
                    </span>
                </div> -->
                <!-- /input-group -->
                <h4 style ="color: #337ab7;"> <i class="fa fa-folder" aria-hidden="true"></i> Danh mục</h4>
            </li>
            <!-- <li>
                <a href="#"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
            </li> -->
          
            <li>
                <a href="admin/chude/danhsach"><i class="fa fa-cube fa-fw"></i> Chủ đề<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="admin/chude/danhsach">Danh sách</a>
                    </li>
                    <li>
                        <a href="admin/chude/them">Thêm chủ đề</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>

            <li>
                <a href="admin/tuvung/danhsach"><i class="fa fa-bar-chart-o fa-fw"></i> Từ vựng<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="admin/tuvung/danhsach">Danh Sách</a>
                    </li>
                    <li>
                        <a href="admin/tuvung/them">Thêm từ vựng</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="#"><i class="fa fa-users fa-fw"></i> User<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{route('user.getDanhSach')}}">Danh sách</a>
                    </li>
                    <li>
                        <a href="{{route('user.getThem')}}">Thêm User</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>