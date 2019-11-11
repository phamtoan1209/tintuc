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
                        <br><br>
                        <div>
                            <form action="{{route($actionList)}}" method="get" class="form-delete">
                                <div class="row">
                                    <div class="col-md-3 form-group">
                                        <input type="text" name="name" class="form-control" value="{{ isset($filter['name']) ? $filter['name'] : '' }}" placeholder="Tên danh mục ...">
                                    </div>
                                    <div class="col-md-3 form-group">
                                        <select name="type" id="type" class="form-control">
                                            <option value=""> -- Chọn danh mục --</option>
                                            <option value="{{$typeProduct}}" {{ (isset($filter['type']) && (int)$filter['type'] == $typeProduct ) ? 'selected="selected"' : '' }}>Danh mục sản phẩm</option>
                                            <option value="{{$typePost}}"  {{ (isset($filter['type']) && (int)$filter['type'] == $typePost ) ? 'selected="selected"' : '' }}>Danh mục tin tức</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3 form-group">
                                        <select name="hot" id="type" class="form-control">
                                            <option value=""> -- Trạng thái nổi bật --</option>
                                            <option value="{{$hot}}" {{ (isset($filter['type']) && (int)$filter['hot'] == $hot ) ? 'selected="selected"' : '' }}>YES</option>
                                            <option value="{{$hot-1}}"  {{ (isset($filter['type']) && (int)$filter['hot'] == 0 ) ? 'selected="selected"' : '' }}>NO</option>
                                        </select>
                                    </div>
                                    <div class="col-md-2">
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
                                    <th>Ảnh</th>
                                    <th>Tên danh mục</th>
                                    <th>Danh mục cha</th>
                                    <th>Thể loại</th>
                                    <th>Nổi bật</th>
                                    <th>Hành động</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($datas as $item)
                                    <tr class='text-success'>
                                        <td>{{$item->id}}</td>
                                        <td>
                                            @if($item->thumb != '')
                                                <img src="{{ asset($item->thumb) }}" alt="{{$item->name}}" width="50">
                                            @endif
                                        </td>
                                        <td>{{$item->name}}</td>
                                        <td>{{!empty($item->parent) ? $item->parent->name : '--'}}</td>
                                        <td>
                                            {{$item->type == $typePost ? 'Tin tức' : 'Sản phẩm'}}
                                        </td>
                                        <td>
                                            <label class="label label-{{$item->hot == $hot ? 'success' : 'default'}}">
                                                {{$item->hot == $hot ? 'YES' : 'NO'}}
                                            </label>
                                        </td>
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
