@extends('admin._partials.master')
@section('title','Admin - Example Detail')
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Your Profile</h3>
                    </div>
                    <!-- form start -->
                    <form role="form" action="{{route('admin.profile')}}" enctype="multipart/form-data" method="post">
                        @csrf
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputUsername1">Full name</label>
                                {!! Form::text('fullname', old( 'fullname',isset($currentAdmin) ? $currentAdmin->fullname : ''), ['class' => 'form-control','placeholder'=>"Text"]) !!}
                                {!! $errors->first('fullname') ? '<p class="text-danger">'. $errors->first('fullname') .'</p>' : ''!!}
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">User name</label>
                                {!! Form::text('username', old( 'username',isset($currentAdmin) ? $currentAdmin->username : ''), ['class' => 'form-control','placeholder'=>"Text",'readonly'=>'true']) !!}
                                {!! $errors->first('username') ? '<p class="text-danger">'. $errors->first('username') .'</p>' : ''!!}
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">Email</label>
                                {!! Form::email('email', old( 'email',isset($currentAdmin) ? $currentAdmin->email : ''), ['class' => 'form-control','placeholder'=>"Text",'readonly'=>'true']) !!}
                                {!! $errors->first('email') ? '<p class="text-danger">'. $errors->first('email') .'</p>' : ''!!}
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">Password</label>
                                {!! Form::password('password', ['class' => 'form-control','placeholder'=>"***********"]) !!}
                                {!! $errors->first('password') ? '<p class="tex text-danger">'. $errors->first('password') .'</p>' : ''!!}
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">Confirm Password</label>
                                {!! Form::password('password_confirmation', ['class' => 'form-control','placeholder'=>"Confirm Password"]) !!}
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Avatar</label>
                                <div class="row">
                                    <div class="col-sm-3">
                                        {!! Form::file('avatar'); !!}
                                        {!! $errors->first('avatar') ? '<p class="text-danger">'. $errors->first('avatar') .'</p>' : ''!!}
                                    </div>
                                    <div class="col-sm-4">
                                        <img src="{{asset($currentAdmin->avatar)}}" alt="{{$currentAdmin->fullname}}" width="150">
                                    </div>
                                </div>
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
