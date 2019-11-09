<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title','Administrator')</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{ asset('backend/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('backend/bower_components/font-awesome/css/font-awesome.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset('backend/bower_components/Ionicons/css/ionicons.min.css')}}">
    <!-- Jquery Confirm -->
    <link rel="stylesheet" href="{{ asset('backend/plugins/jquery-confirm/jquery-confirm.min.css')}}">
    @yield('css')
<!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('backend/dist/css/AdminLTE.min.css')}}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{ asset('backend/dist/css/skins/_all-skins.min.css')}}">
    <!-- jvectormap -->
    <link rel="stylesheet" href="{{ asset('backend/bower_components/jvectormap/jquery-jvectormap.css')}}">
    <!-- backend css-->
    <link rel="stylesheet" href="{{ asset('css/backend.css')}}">
    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    @include('admin._partials.header')
    <!-- Left side column. contains the logo and sidebar -->
    @include('admin._partials.sidebar-left')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Breadcrumb -->
        @include('admin._partials.breadcrumb')
        <!-- Main content -->
        @yield('content')
        <!-- /.content -->
        @include('admin._partials.alert-message')
    </div>
    <!-- /.content-wrapper -->

    <!-- Footer -->
    @include('admin._partials.footer')
    <!-- /.Footer -->

    <!-- Control Sidebar -->
    @include('admin._partials.control-sidebar-right')

</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="{{ asset('backend/bower_components/jquery/dist/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('backend/bower_components/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    var baseUrl = '{{url('/')}}';
    var activeMenu = '{{ isset($modul) ? strtolower($modul) : 'dashboard' }}';
    $('.item-menu').removeClass('active');
    $('.item-menu-'+activeMenu).addClass('active');
    $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('backend/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- jvectormap -->
<script src="{{ asset('backend/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
<script src="{{ asset('backend/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
<!-- Slimscroll -->
<script src="{{ asset('backend/bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('backend/dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('backend/dist/js/pages/dashboard.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('backend/dist/js/demo.js')}}"></script>
<!-- Jquery confirm -->
<script src="{{ asset('backend/plugins/jquery-confirm/jquery-confirm.min.js')}}"></script>
@yield('script')
<script type="text/javascript" src="{{asset('js/backend.js')}}"></script>
</body>
</html>
