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
                                    <th>Name</th>
                                    <th>Access</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($datas as $item)
                                    <tr>
                                        <td>{{$item->id}}</td>
                                        <td>{{$item->name}}</td>
                                        <td>{{$item->access}}</td>
                                        <td>
                                            @if($item->access != 'superadmin')
                                                <div class="rơw">
                                                    <div class="form-group">
                                                        <?=view('admin._partials._edit_item')->with(['item' => $item,'actionUpdate' => $actionUpdate])?>
                                                        <?=view('admin._partials._delete_item')->with(['item' => $item,'actionDelete' => $actionDelete])?>
                                                    </div>
                                                </div>
                                            @endif
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
