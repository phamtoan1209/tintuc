@extends('admin._partials.master')
@section('title','Admin - Create - Update '.$breadcrumb)
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Thông tin liên hệ</h3>
                    </div>
                    <!-- form start -->
                    <div class="box-body">
                        <div class="form-group">
                            <i class="fa fa-user"></i> <label>Họ và tên :</label> <span style="color: #EA4335;">{{$contact->name}}</span>
                        </div>
                        <div class="form-group">
                            <i class="fa fa-envelope-o"></i> <label>Email :</label> <span style="color: #EA4335;">{{$contact->email}}</span>
                        </div>
                        <div class="form-group">
                            <i class="fa fa-phone-square"></i> <label>Số điện thoại :</label> <span style="color: #EA4335;">{{$contact->phone}}</span>
                        </div>
                        <div class="form-group">
                            <i class="fa fa-user"></i> <label>Nội dung : </label> <p>{{$contact->content}}</p>
                        </div>
                    </div>
                    <div class="box-footer">
                        <a href="{{route($actionList)}}" class="btn btn-default btn-flat">Quay lại</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
@section('css')
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('backend/bower_components/select2/dist/css/select2.min.css') }}">
@stop
@section('script')
    <!-- Select2 -->
    <script src="{{ asset('backend/bower_components/select2/dist/js/select2.full.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('.select2').select2();
        });
    </script>
@stop
