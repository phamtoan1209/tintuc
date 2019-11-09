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
                    <form role="form" method="post" action="{{ isset($item) ? route($actionUpdate,['id'=>$item->id]) : route($actionCreate) }}">
                        @csrf
                        <div class="box-body">
                            <div class="form-group">
                                <label>Thành phố</label>
                                <select name="city" id="city" class="form-control" required>
                                    <option value=""> -- Chọn thành phố --</option>
                                    @foreach($listProvince as $k => $v)
                                        <option value="{{$k}}" {{ isset($item) && $item->city == $k ? 'selected' : ''}}>{{$v}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Tên cửa hàng</label>
                                {!! Form::text('name', old( 'name',isset($item) ? $item->name : ''), ['class' => 'form-control','placeholder'=>"Tên cửa hàng"]) !!}
                                {!! $errors->first('name') ? '<p class="text-danger">'. $errors->first('name') .'</p>' : ''!!}
                            </div>
                            <div class="form-group">
                                <label>Số điện thoại</label>
                                {!! Form::text('phone', old( 'phone',isset($item) ? $item->phone : ''), ['class' => 'form-control','placeholder'=>"Số điện thoại"]) !!}
                            </div>
                            <div class="form-group">
                                <label>Địa chỉ</label>
                                {!! Form::text('address', old( 'address',isset($item) ? $item->address : ''), ['class' => 'form-control','placeholder'=>"Địa chỉ"]) !!}
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
@stop
@section('script')
    <!-- Select2 -->
    <script src="{{ asset('backend/bower_components/select2/dist/js/select2.full.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#city').select2();
        });
    </script>
@stop
