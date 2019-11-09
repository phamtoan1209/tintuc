@extends('admin._partials.master')
@section('title','Admin - Create - Update '.$breadcrumb)
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Thêm - Sửa - {{$breadcrumb}}</h3>
                    </div>
                    <!-- form start -->
                    <form role="form" method="post" enctype="multipart/form-data" action="{{ isset($item) ? route($actionUpdate,['id'=>$item->id]) : route($actionCreate) }}">
                        @csrf
                        <input type="hidden" name="admin_id" value="{{$currentAdmin->id}}">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputFile">Ảnh đại diện</label>
                                <input type="file" name="thumb" id="thumb" accept="image/*"><br>
                                <?php if(isset($item) && $item->avatar != ''): ?>
                                <img src="{{asset($item->avatar)}}" alt="" width="200">
                                <?php endif; ?>
                            </div>
                            <div class="form-group">
                                <label>Họ tên</label>
                                {!! Form::text('name', old( 'name',isset($item) ? $item->name : ''), ['class' => 'form-control','placeholder'=>"Họ tên"]) !!}
                                {!! $errors->first('name') ? '<p class="text-danger">'. $errors->first('name') .'</p>' : ''!!}
                            </div>
                            <div class="form-group">
                                <label>Số điện thoại</label>
                                {!! Form::text('phone', old( 'phone',isset($item) ? $item->phone : ''), ['class' => 'form-control','placeholder'=>"Số điện thoại"]) !!}
                                {!! $errors->first('phone') ? '<p class="text-danger">'. $errors->first('phone') .'</p>' : ''!!}
                            </div>
                            <div class="form-group">
                                <label>Link facebook</label>
                                {!! Form::text('facebook', old( 'facebook',isset($item) ? $item->facebook : ''), ['class' => 'form-control','placeholder'=>"Link facebook"]) !!}
                            </div>
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary btn-flat">Xác nhận</button>
                            <a href="{{route($actionList)}}" class="btn btn-default btn-flat btn-back">Quay lại</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@stop
@section('css')
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('backend/bower_components/select2/dist/css/select2.min.css') }}">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="{{ asset('backend/plugins/iCheck/all.css') }}">
@stop
@section('script')
    <!-- Select2 -->
    <script src="{{ asset('backend/bower_components/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('backend/bower_components/ckeditor/ckeditor.js') }}"></script>
    <!-- iCheck 1.0.1 -->
    <script src="{{ asset('backend/plugins/iCheck/icheck.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('.select2').select2();
            CKEDITOR.replace('editor1',{
                uiColor : '#57B900',
                language : 'vi',
                height : '600',
                filebrowserBrowseUrl: '{{ asset('backend/plugins/ckfinder/ckfinder.html') }}',
                filebrowserImageBrowseUrl: '{{ asset('backend/plugins/ckfinder/ckfinder.html?type=Images') }}',
                filebrowserFlashBrowseUrl: '{{ asset('backend/plugins/ckfinder/ckfinder.html?type=Flash') }}',
                filebrowserUploadUrl: '{{ asset('backend/plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files') }}',
                filebrowserImageUploadUrl: '{{ asset('backend/plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images') }}',
                filebrowserFlashUploadUrl: '{{ asset('backend/plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash') }}'
            });
            $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
                checkboxClass: 'icheckbox_minimal-blue',
                radioClass   : 'iradio_minimal-blue'
            });
        });
    </script>
@stop
