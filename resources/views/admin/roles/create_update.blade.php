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
                    <form role="form" action="{{ isset($item) ? route($actionUpdate,['id' => $item->id]) : route($actionCreate) }}" method="post">
                        @csrf
                        <div class="box-body">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="exampleInputUsername1">Name</label>
                                    {!! Form::text('name', old( 'name',isset($item) ? $item->name : ''), ['class' => 'form-control','placeholder'=>"Name role"]) !!}
                                    {!! $errors->first('name') ? '<p class="text-danger">'. $errors->first('name') .'</p>' : ''!!}
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="exampleInputUsername1">Access</label>
                                    {!! Form::text('access', old( 'access',isset($item) ? $item->access : ''), ['class' => 'form-control','placeholder'=>"Access role"]) !!}
                                    {!! $errors->first('access') ? '<p class="text-danger">'. $errors->first('access') .'</p>' : ''!!}
                                </div>
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
