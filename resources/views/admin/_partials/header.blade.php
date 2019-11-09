<header class="main-header">
    <!-- Logo -->
    <a href="{{route('admin')}}" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>{{Config::get('webinfos.WORD_BOLD')}}</b>{{Config::get('webinfos.WORD_NORMAL')}}</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>{{Config::get('webinfos.WORD_BOLD')}}</b>{{Config::get('webinfos.WORD_NORMAL')}}</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="{{ asset($currentAdmin->avatar)}}" class="user-image" alt="User Image">
                        <span class="hidden-xs">{{$currentAdmin->fullname}}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="{{ asset($currentAdmin->avatar)}}" class="img-circle" alt="User Image">

                            <p>
                                {{$currentAdmin->fullname}} - Quản trị viên
                                <small>Admin since {{$currentAdmin->created_at}}</small>
                            </p>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="{{route('admin.profile')}}" class="btn btn-default btn-flat">Tài khoản</a>
                            </div>
                            <div class="pull-right">
                                <form action="{{route('adminLogout')}}" method="post">
                                    @csrf
                                    <button type="submit" class="btn btn-default btn-flat">Đăng xuất</button>
                                </form>
                            </div>
                        </li>
                    </ul>
                </li>
                <!-- Control Sidebar Toggle Button -->
                <li>
                    <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                </li>
            </ul>
        </div>
    </nav>
</header>