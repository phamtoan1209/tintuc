<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin - Login</title>
    <link rel="stylesheet" href="{{asset('backend/library/bootstrap.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css">
    <link rel="stylesheet" href="{{asset('backend/library/style.css')}}">
    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<div class="login-box">
    <div class="container">
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="card card-signin my-5">
                    <div class="card-body">
                        <h5 class="card-title text-center"><i class="fas fa-user-cog"></i> Admin</h5>
                        <form action="{{route('adminLogin')}}" method="post">
                            @csrf
                            <div class="form-label-group">
                                {!! Form::text('username',old('username'),['class'=>'form-control','placeholder'=>'Email hoặc tên đăng nhập','id' => 'inputEmail']) !!}
                                <label for="inputEmail">Email hoặc tên đăng nhập</label>
                                {!! $errors->first('username') ? '<p class="text-danger">'. $errors->first('username') .'</p>' : ''!!}
                            </div>

                            <div class="form-label-group">
                                <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
                                <label for="inputPassword">Mật khẩu</label>
                                {!! $errors->first('password') ? '<p class="text-danger">'. $errors->first('password') .'</p>' : ''!!}
                            </div>
                            <div class="form-group">
                                <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit"><i class="fas fa-sign-in-alt"></i> Đăng nhập</button>
                            </div>
                            <div class="form-group">
                                <p class="">
                                    {!! $errors->first('message') ? '<span class="text-danger">' . $errors->first('message') . '</span>' : '' !!}
                                </p>
                            </div>
                            <div style="margin-top: 5px;">
                                Copyright © 2019-2020 <b>{{Config::get('webinfos.TITLE')}}</b>.
                            </div>
                            <hr class="my-4">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="{{ asset ('backend/bower_components/jquery/dist/jquery.min.js') }}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset ('backend/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
</body>
</html>
