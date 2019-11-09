@extends('admin._partials.master')
@section('title','Quản lý '.$breadcrumb)
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-lg-12 ">
                <div class="box box-success">
                    <div class="box-header">
                        <?= view('admin._partials._breadcumb')?>
                        <?= view('admin._partials._btn_add')?>
                        <div>
                            <form action="{{route($actionList)}}" method="get" class="form-delete">
                                <div class="row">
                                    <div class="col-md-3 form-group">
                                        <input type="text" name="name" class="form-control" value="{{ isset($filter['name']) ? $filter['name'] : '' }}" placeholder="Tên cửa hàng hoặc số đt ...">
                                    </div>
                                    <div class="col-md-3 form-group">
                                        <select name="city" id="type" class="form-control">
                                            <option value=""> -- Chọn thành tỉnh/phố --</option>
                                            @foreach($listProvince as $k => $v)
                                                <option value="{{$k}}" {{isset($filter['city']) && $filter['city'] == $k ? 'selected' : ''}}>{{$v}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-2 form-group">
                                        <button class="btn btn-warning btn-sm" type="submit"><i class="fa fa-filter"></i> Tìm kiếm</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Tên cửa hàng</th>
                                    <th>Số điện thoại</th>
                                    <th>Địa chỉ</th>
                                    <th>Thành phố</th>
                                    <th>Hành động</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($datas as $item)
                                    <tr class='text-success'>
                                        <td>{{$item->id}}</td>
                                        <td>{{$item->name}}</td>
                                        <td>{{$item->phone}}</td>
                                        <td>{{$item->address}}</td>
                                        <td>{{$listProvince[$item->city]}}</td>
                                        <td>
                                            <div class="rơw">
                                                <div class="form-group">
                                                    <?=view('admin._partials._edit_item')->with(['item' => $item,'actionUpdate' => $actionUpdate])?>
                                                    <?=view('admin._partials._delete_item')->with(['item' => $item,'actionDelete' => $actionDelete])?>
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
