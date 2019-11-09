<?php $roleCurrentAdmin = $currentAdmin->roles();?>
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset($currentAdmin->avatar)}}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{$currentAdmin->fullname}}</p>
                <a href="#"><i class="fa fa-circle text-warning">{{$currentAdmin->username}}</i></a>
            </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">Admin Temp</li>
            <li class="item-menu-dashboard">
                <a href="{{route('admin')}}">
                    <i class="fa fa-dashboard"></i> <span>Trang chủ</span>
                </a>
            </li>

            @if(in_array('superadmin',$roleCurrentAdmin) || in_array('can_manage_categorys',$roleCurrentAdmin))
                <li class="treeview item-menu-categorys">
                    <a href="#">
                        <i class="fa fa-th "></i>
                        <span>Quản lý danh mục</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{route('categorys.list')}}"><i class="fa fa-server"></i>Danh sách</a></li>
                        <li><a href="{{route('categorys.create')}}"><i class="fa fa-plus"></i>Thêm</a></li>
                    </ul>
                </li>
            @endif

            @if(in_array('superadmin',$roleCurrentAdmin) || in_array('can_manage_products',$roleCurrentAdmin))
                <li class="treeview item-menu-products">
                    <a href="#">
                        <i class="fa fa-adn"></i>
                        <span>Quản lý sản phẩm</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{route('products.list')}}"><i class="fa fa-server"></i>Danh sách</a></li>
                        <li><a href="{{route('products.create')}}"><i class="fa fa-plus"></i>Thêm</a></li>
                    </ul>
                </li>
            @endif

            @if(in_array('superadmin',$roleCurrentAdmin) || in_array('can_manage_posts',$roleCurrentAdmin))
                <li class="treeview item-menu-posts">
                    <a href="#">
                        <i class="fa fa-list "></i>
                        <span>Quản lý tin tức</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{route('posts.list')}}"><i class="fa fa-server"></i>Danh sách</a></li>
                        <li><a href="{{route('posts.create')}}"><i class="fa fa-plus"></i>Thêm</a></li>
                    </ul>
                </li>
            @endif

            @if(in_array('superadmin',$roleCurrentAdmin) || in_array('can_manage_supports',$roleCurrentAdmin))
                <li class="treeview item-menu-supports hidden">
                    <a href="#">
                        <i class="fa fa-user"></i>
                        <span>Quản lý người hỗ trợ</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{route('supports.list')}}"><i class="fa fa-server"></i>Danh sách</a></li>
                        <li><a href="{{route('supports.create')}}"><i class="fa fa-plus"></i>Thêm</a></li>
                    </ul>
                </li>
            @endif

            @if(in_array('superadmin',$roleCurrentAdmin) || in_array('can_manage_stores',$roleCurrentAdmin))
                <li class="treeview item-menu-stores hidden">
                    <a href="#">
                        <i class="fa fa-map-marker"></i>
                        <span>Quản lý cửa hàng</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{route('stores.list')}}"><i class="fa fa-server"></i>Danh sách</a></li>
                        <li><a href="{{route('stores.create')}}"><i class="fa fa-plus"></i>Thêm</a></li>
                    </ul>
                </li>
            @endif

            @if(in_array('superadmin',$roleCurrentAdmin) || in_array('can_manage_websites',$roleCurrentAdmin))
                <li class="treeview item-menu-websites">
                    <a href="#">
                        <i class="fa fa-globe "></i>
                        <span>Thông tin website</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{route('websites.list')}}"><i class="fa fa-server"></i>Danh sách</a></li>
                    </ul>
                </li>
            @endif

            @if(in_array('superadmin',$roleCurrentAdmin) || in_array('can_manage_intros',$roleCurrentAdmin))
                <li class="treeview item-menu-intros">
                    <a href="#">
                        <i class="fa fa-bullhorn "></i>
                        <span>Trang tĩnh</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{route('intros.list')}}"><i class="fa fa-server"></i>Trang tĩnh</a></li>
                    </ul>
                </li>
            @endif

            @if(in_array('superadmin',$roleCurrentAdmin) || in_array('can_manage_slides',$roleCurrentAdmin))
                <li class="treeview item-menu-slides">
                    <a href="#">
                        <i class="fa fa-file-image-o "></i>
                        <span>Quản lý slides</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{route('slides.list')}}"><i class="fa fa-server"></i>Danh sách</a></li>
                        <li><a href="{{route('slides.create')}}"><i class="fa fa-plus"></i>Thêm</a></li>
                    </ul>
                </li>
            @endif

            @if(in_array('superadmin',$roleCurrentAdmin) || in_array('can_manage_slides',$roleCurrentAdmin))
                <li class="treeview item-menu-admin">
                    <a href="#">
                        <i class="fa fa-address-book-o"></i>
                        <span>Quản lý admin</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{route('admins.list')}}"><i class="fa fa-server"></i>List</a></li>
                        <li><a href="{{route('admins.create')}}"><i class="fa fa-plus"></i>Add admin</a></li>
                    </ul>
                </li>
            @endif

            @if(in_array('superadmin',$roleCurrentAdmin) && isset($show))
                <li class="treeview item-menu-role">
                    <a href="#">
                        <i class="fa fa-unlock-alt "></i>
                        <span>Manage Roles</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{route('roles.list')}}"><i class="fa fa-server"></i>List</a></li>
                        <li><a href="{{route('roles.create')}}"><i class="fa fa-plus"></i>Add role</a></li>
                    </ul>
                </li>
            @endif

            @if((in_array('superadmin',$roleCurrentAdmin) || in_array('can_manage_contacts',$roleCurrentAdmin)))
                <li class="treeview item-menu-contacts">
                    <a href="#">
                        <i class="fa fa-envelope "></i>
                        <span>Quản lý liên hệ</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{route('contacts.list')}}"><i class="fa fa-server"></i>Danh sách</a></li>
                    </ul>
                </li>
            @endif
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>