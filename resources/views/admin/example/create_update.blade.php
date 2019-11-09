@extends('admin._partials.master')
@section('title','Admin - Example Detail')
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Form - Create - Update</h3>
                    </div>
                    <!-- form start -->
                    <form role="form">
                        @csrf
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputUsername1">Input and Icon</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    {!! Form::text('nameinput', old( 'nameinput',isset($item) ? $item->name : ''), ['class' => 'form-control','placeholder'=>"Text"]) !!}
                                    {!! $errors->first('nameinput') ? '<p class="text-danger">'. $errors->first('nameinput') .'</p>' : ''!!}
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Input and Button</label>
                                <div class="input-group">
                                    {!! Form::text('nameinput', old( 'nameinput', isset($item) ? $item->name : ''), ['class' => 'form-control','placeholder'=>"Text"]) !!}
                                    <span class="input-group-btn">
                                      <button type="button" class="btn btn-info btn-flat">Go!</button>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Date:</label>
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    {!! Form::text('namedateinput', old( 'namedateinput', isset($item) ? $item->date : ''), ['class' => 'form-control','id'=>'datepicker']) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Date range:</label>

                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    {!! Form::text('rangdateinput',old( 'rangdateinput', isset($item)?$item->rangdate:''),['class'=>'form-control','id'=>'reservation']) !!}
                                </div>
                                <!-- /.input group -->
                            </div>
                            <div class="form-group">
                                <label>Select Single:</label>
                                {!! Form::select('nameselectsingle',
                                [1=>'Alaska',2=>'California',3=>'Delaware'],
                                old( 'nameselectsingle', isset($item)?$item->selectsingle:''),
                                ['class'=>'form-control select2','style'=>'width: 100%;']) !!}
                            </div>
                            <div class="form-group">
                                <label>Select Multiple:</label>
                                {!! Form::select('nameselectmultiple[]',
                                [1=>'Alaska',2=>'California',3=>'Delaware'],
                                [1,3],
                                ['class'=>'form-control select2','style'=>'width: 100%;','multiple'=>'true']) !!}
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2 col-sm-3 col-xs-12">
                                        <label>
                                            {!! Form::checkbox('namecheckbox',true,old('namecheckbox',isset($item)?$item->namecheckbox:''),['class'=>'minimal']) !!}
                                            Yes
                                        </label>
                                    </div>
                                    <div class="col-md-2 col-sm-3 col-xs-12">
                                        <label>
                                            {!! Form::checkbox('namecheckbox',false,old('namecheckbox',isset($item)?$item->namecheckbox:''),['class'=>'minimal']) !!}
                                            No
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>CK Editor:</label>
                                {!! Form::textarea('textarea',old('textarea',isset($item)?$item->textaera:''),['class'=>'form-control','id'=>'editor1','rows'=>'15']) !!}
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">File input</label>
                                <input type="file" id="exampleInputFile">
                                <p class="help-block">Example help text here.</p>
                            </div>
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary btn-flat">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@stop
@section('css')
    <!-- Date Picker -->
    <link rel="stylesheet" href="{{ asset('backend/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('backend/bower_components/bootstrap-daterangepicker/daterangepicker.css')}}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('backend/bower_components/select2/dist/css/select2.min.css') }}">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="{{ asset('backend/plugins/iCheck/all.css') }}">
@stop
@section('script')
    <!-- daterangepicker -->
    <script src="{{ asset('backend/bower_components/moment/min/moment.min.js')}}"></script>
    <script src="{{ asset('backend/bower_components/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
    <!-- datepicker -->
    <script src="{{ asset('backend/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
    <!-- Select2 -->
    <script src="{{ asset('backend/bower_components/select2/dist/js/select2.full.min.js') }}"></script>
    <!-- iCheck 1.0.1 -->
    <script src="{{ asset('backend/plugins/iCheck/icheck.min.js') }}"></script>
    <!-- CK Editor -->
    <script src="{{ asset('backend/bower_components/ckeditor/ckeditor.js') }}"></script>
@stop