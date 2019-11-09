@extends('admin._partials.master')
@section('title','Admin - List '.$modul.'s')
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-lg-12 ">
                <div class="box box-success">
                    <div class="box-header">
                        <?= view('admin._partials._breadcumb')?>
                        <?= view('admin._partials._btn_add')?>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Full name</th>
                                    <th>User name</th>
                                    <th>Email</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($datas as $item)
                                    <tr class='{{($item->is_block)? 'text-danger' : 'text-success'}}'>
                                        <td>{{$item->id}}</td>
                                        <td>{{$item->fullname}}</td>
                                        <td>{{$item->username}}</td>
                                        <td>{{$item->email}}</td>
                                        <td>
                                            <div class="rơw">
                                                <div class="form-group">
                                                    @if($item->username != 'admin')
                                                        <label for="">
                                                            <form action="{{route($actionBlock,['id'=>$item->id])}}" method="post" class="form-block">
                                                                {!! Form::hidden('is_block', ($item->is_block) ? 0 : 1 ) !!}
                                                                @csrf
                                                                <a href="javascript:void(0)" class="btn btn-xs bg-{{ ($item->is_block) ? 'gray' : 'green' }} btn-flat btn-block" title="Block" data="{{ ($item->is_block) ? 'unblock' : 'block' }}">
                                                                    <i class="fa fa-{{ ($item->is_block) ? 'lock' : 'unlock' }}"></i>
                                                                    {{ ($item->is_block) ? 'Unblock' : 'Block' }}
                                                                </a>
                                                            </form>
                                                        </label>
                                                        <?=view('admin._partials._edit_item')->with(['item' => $item,'actionUpdate' => $actionUpdate])?>
                                                        <?=view('admin._partials._delete_item')->with(['item' => $item,'actionDelete' => $actionDelete])?>
                                                    @endif
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                <?= view('admin._partials.norecord_pagination')->with(['datas' => $datas]) ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
        </div>
    </section>
@stop
