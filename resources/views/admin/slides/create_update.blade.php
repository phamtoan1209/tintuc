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
                                <label for="exampleInputFile">Ảnh slide</label>
                                <input type="file" name="thumb" id="thumb" accept="image/*" {{ !isset($item) ? 'required="required"' : ''}}><br>
                                <p>Lưu ý: Chọn ảnh kích thước 1600x550 để có hiển thị tốt nhất</p>
                                <?php if(isset($item) && $item->thumb != ''): ?>
                                    <img src="{{asset($item->thumb)}}" alt="" width="200">
                                <?php endif; ?>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2 col-sm-3 col-xs-12">
                                        <label>
                                            {!! Form::checkbox('status',true,old('status',isset($item) ? $item->status :0),['class'=>'minimal']) !!}
                                            Hiển thị
                                        </label>
                                    </div>
                                </div>
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
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="{{ asset('backend/plugins/iCheck/all.css') }}">
@stop
@section('script')
    <!-- iCheck 1.0.1 -->
    <script src="{{ asset('backend/plugins/iCheck/icheck.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
                checkboxClass: 'icheckbox_minimal-blue',
                radioClass   : 'iradio_minimal-blue'
            });
        });
    </script>
@stop
