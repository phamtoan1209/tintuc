@extends('admin._partials.master')
@section('title','Admin - Create - Update '.$modul)
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Create - Update - {{$modul}}s</h3>
                    </div>
                    <!-- form start -->
                    <form role="form" method="post" action="{{ isset($item) ? route($actionUpdate,['id'=>$item->id]) : route($actionCreate) }}">
                        @csrf
                        <div class="box-body">
                            <div class="form-group">
                                <label>Full name</label>
                                {!! Form::text('fullname', old( 'fullname',isset($item) ? $item->fullname : ''), ['class' => 'form-control','placeholder'=>"Full name"]) !!}
                                {!! $errors->first('fullname') ? '<p class="text-danger">'. $errors->first('fullname') .'</p>' : ''!!}
                            </div>
                            <div class="form-group">
                                <label>User name</label>
                                {!! Form::text('username', old( 'username',isset($item) ? $item->username : ''), ['class' => 'form-control','placeholder'=>"User name"]) !!}
                                {!! $errors->first('username') ? '<p class="text-danger">'. $errors->first('username') .'</p>' : ''!!}
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                {!! Form::email('email', old( 'email',isset($item) ? $item->email : ''), ['class' => 'form-control','placeholder'=>"Email"]) !!}
                                {!! $errors->first('email') ? '<p class="text-danger">'. $errors->first('email') .'</p>' : ''!!}
                            </div>
                            @if(isset($item))
                                <div class="form-group">
                                    <label>Select Roles:</label>
                                    {!! Form::select('roles[]',$roles ? $roles : [],
                                    $roleOFAdmin,
                                    ['class'=>'form-control select2','style'=>'width: 100%;','multiple'=>'true']) !!}
                                    {!! $errors->first('roles') ? '<p class="text-danger">'. $errors->first('roles') .'</p>' : '' !!}
                                </div>
                            @endif
                            <div class="form-group">
                                <label>Password</label>
                                {!! Form::password('password',['class' => 'form-control','placeholder'=>"********"]) !!}
                                {!! $errors->first('password') ? '<p class="text-danger">'. $errors->first('password') .'</p>' : '' !!}
                            </div>
                            <div class="form-group">
                                <label>Confirm password</label>
                                {!! Form::password('password_confirmation',['class' => 'form-control','placeholder'=>"********"]) !!}
                            </div>
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary btn-flat">Submit</button>
                            <a href="{{route($actionList)}}" class="btn btn-default btn-flat btn-back">Back</a>
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
