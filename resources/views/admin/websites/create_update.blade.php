@extends('admin._partials.master')
@section('title','Admin - Create - Update '.$breadcrumb)
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Sửa - {{$breadcrumb}}</h3>
                    </div>
                    <!-- form start -->
                    <form role="form" method="post" action="{{ isset($item) ? route($actionUpdate,['id'=>$item->id]) : route($actionCreate) }}" enctype="multipart/form-data">
                        @csrf
                        <div class="box-body">
                            <div class="form-group">
                                <input type="hidden" name="key" value="{{$item->key}}">
                                <label>{{$item->name}}:</label>
                                @if($item->key != 'logo' && $item->key != 'favicon')
                                    {!! Form::textarea('value', old( 'value',isset($item) ? $item->value : ''), ['class' => 'form-control','placeholder'=>"Mô tả", 'rows' => 4]) !!}
                                    {!! $errors->first('value') ? '<p class="text-danger">'. $errors->first('value') .'</p>' : ''!!}
                                @else
                                    <input type="file" name="value" required style="margin-bottom: 20px;" accept="image/*">
                                    @if($item->value != '')
                                        @if($item->key == 'favicon')
                                            <img src="{{asset($item->value)}}" width="40" >
                                        @else
                                            <img src="{{asset($item->value)}}" width="200" >
                                        @endif
                                    @endif
                                    {!! $errors->first('value') ? '<p class="text-danger">'. $errors->first('value') .'</p>' : ''!!}
                                @endif
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
            $('.select2').select2();
        });
    </script>
@stop
