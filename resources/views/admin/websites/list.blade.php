@extends('admin._partials.master')
@section('title','Quản lý '.$breadcrumb)
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-lg-12 ">
                <div class="box box-success">
                    <div class="box-header">
                        <?= view('admin._partials._breadcumb')?>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Tên thông tin</th>
                                    <th>Giá trị</th>
                                    <th>Hành động</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $i=0; ?>
                                @foreach($datas as $item)
                                    <?php $i++; ?>
                                    @if($item->key == 'account_mail' && $currentAdmin->username != 'admin'):
                                    @else
                                        <tr class='text-success'>
                                            <td>{{$i}}</td>
                                            <td>{{$item->name}}</td>
                                            @if($item->key != 'logo' && $item->key != 'favicon')
                                                <td>{{$item->value}}</td>
                                            @else
                                                <td><img src="{{asset($item->value)}}" @if($item->key == 'favicon') width="40" @else width="200" @endif alt=""></td>
                                            @endif
                                            <td>
                                                <div class="rơw">
                                                    <div class="form-group">
                                                        <?=view('admin._partials._edit_item')->with(['item' => $item,'actionUpdate' => $actionUpdate])?>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endif
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
