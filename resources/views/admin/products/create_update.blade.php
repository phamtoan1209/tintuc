@extends('admin._partials.master')
@section('title','Admin - Create - Update '.$breadcrumb)
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-md-{{isset($item) ? 7 : 12}}">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Thêm - Sửa - {{$breadcrumb}}</h3>
                    </div>
                    <!-- form start -->
                    <form role="form" method="post" enctype="multipart/form-data" action="{{ isset($item) ? route($actionUpdate,['id'=>$item->id]) : route($actionCreate) }}">
                        @csrf
                        <input type="hidden" name="admin_id" value="{{$currentAdmin->id}}">
                        <div class="box-body">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-8">
                                        <label for="exampleInputFile">Ảnh sản phẩm</label>
                                        <input type="file" name="thumb" id="thumb" accept="image/*"><br>
                                        <p>Lưu ý: Chọn ảnh vuông để hiển thị đẹp nhất</p>
                                    </div>
                                    <div class="col-md-4">
                                        <?php if(isset($item) && $item->thumb != ''): ?>
                                        <img src="{{asset($item->thumb)}}" alt="" width="150">
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Thể loại</label>
                                {!! Form::select('category_id',
                                $selectCategory,
                                old( 'category_id', isset($item)?$item->category_id:''),
                                ['class'=>'form-control select2','style'=>'width: 100%;','placeholder' => ' -- Chọn danh mục -- ']) !!}
                                {!! $errors->first('category_id') ? '<p class="text-danger">'. $errors->first('category_id') .'</p>' : ''!!}
                            </div>
                            <div class="form-group">
                                <label>Tên sản phẩm</label>
                                {!! Form::text('name', old( 'name',isset($item) ? $item->name : ''), ['class' => 'form-control','placeholder'=>"Tên sản phẩm"]) !!}
                                {!! $errors->first('name') ? '<p class="text-danger">'. $errors->first('name') .'</p>' : ''!!}
                            </div>
                            <div class="form-group">
                                <label>Mô tả ngắn</label>
                                {!! Form::textarea('description', old( 'description',isset($item) ? $item->description : ''), ['class' => 'form-control','placeholder'=>"Mô tả ngắn",'rows' => '5']) !!}
                                {!! $errors->first('description') ? '<p class="text-danger">'. $errors->first('description') .'</p>' : ''!!}
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6 col-sm-3 col-xs-12">
                                        <label>
                                            {!! Form::checkbox('status',true,old('status',isset($item)? $item->status :0),['class'=>'minimal']) !!}
                                            Hiển thị
                                        </label>
                                        <label>
                                            {!! Form::checkbox('hot',true,old('hot',isset($item)? $item->hot :0),['class'=>'minimal']) !!}
                                            Sản phẩm hot
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Bài viết về sản phẩm</label>
                                {!! Form::textarea('content', old( 'content',isset($item) ? $item->content : ''), ['class' => 'form-control','id'=>'editor1','rows'=>'25','placeholder'=>"Bài viết về sản phẩm"]) !!}
                                {!! $errors->first('content') ? '<p class="text-danger">'. $errors->first('content') .'</p>' : ''!!}
                            </div>
                            {!! \app\Helpers\Widgets::getFormSeo(isset($item) ? $item : null) !!}
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary btn-flat">Xác nhận</button>
                            <a href="{{route($actionList)}}" class="btn btn-default btn-flat btn-back">Quay lại</a>
                        </div>
                    </form>
                </div>
            </div>
            @if(isset($item))
                <div class="col-md-5">
                    <div class="box box-warning">
                        <div class="box-header with-border">
                            <h3 class="box-title">Chi tiết {{$breadcrumb}}</h3>
                        </div>
                        <div>
                            <table class="table table-striped">
                                <tr>
                                    <th>Thông số</th>
                                    <th>Giá trị</th>
                                    <th>Quản lý</th>
                                </tr>
                                @if(!empty($item->details))
                                        @foreach($item->details as $detail)
                                            <tr>
                                                <td>{{$detail->name}}</td>
                                                <td>{{$detail->value}}</td>
                                                <td>
                                                    <label for="">
                                                        <form action="{{route($actionDelDetail,['id'=>$detail->id])}}" method="post" class="form-delete">
                                                            @csrf
                                                            <a href="javascript:void(0)" class="btn btn-xs btn-danger btn-flat btn-delete" title="Delete">
                                                                <i class="fa fa-times"></i> Xóa
                                                            </a>
                                                        </form>
                                                    </label>
                                                </td>
                                            </tr>
                                    @endforeach
                                    @endif
                            </table>
                        </div>
                        <!-- form start -->
                        <form role="form" method="post" enctype="multipart/form-data" action="{{ route($actionAddDetail,['product_id'=>$item->id]) }}">
                            @csrf
                            <div class="box-body">
                                <div class="form-group">
                                    <label>Thông số</label>
                                    {!! Form::text('name','', ['class' => 'form-control','placeholder'=>"Tên thông số","required" => "required"]) !!}
                                    {!! $errors->first('name') ? '<p class="text-danger">'. $errors->first('name') .'</p>' : ''!!}
                                </div>
                                <div class="form-group">
                                    <label>Giá trị</label>
                                    {!! Form::text('value', '', ['class' => 'form-control','placeholder'=>"Giá trị","required" => "required"]) !!}
                                    {!! $errors->first('value') ? '<p class="text-danger">'. $errors->first('value') .'</p>' : ''!!}
                                </div>
                            </div>
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary btn-flat">Xác nhận</button>
                            </div>
                        </form>
                    </div>
                    <div class="box box-success">
                        <div class="box-header with-border">
                            <h3 class="box-title">Ảnh chi tiết {{$breadcrumb}}</h3>
                        </div>
                        <div>
                            <table class="table table-striped">
                                <tr>
                                    <th>Ảnh</th>
                                    <th>Quản lý</th>
                                </tr>
                                @if(!empty($item->images))
                                    @foreach($item->images as $detail)
                                        <tr>
                                            <td>
                                                <img width="50" src="{{asset($detail->thumb)}}">
                                            </td>
                                            <td>
                                                <label for="">
                                                    <form action="{{route($actionDelImage,['id'=>$detail->id])}}" method="post" class="form-delete">
                                                        @csrf
                                                        <a href="javascript:void(0)" class="btn btn-xs btn-danger btn-flat btn-delete" title="Delete">
                                                            <i class="fa fa-times"></i> Xóa
                                                        </a>
                                                    </form>
                                                </label>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </table>
                        </div>
                        <!-- form start -->
                        <form role="form" method="post" enctype="multipart/form-data" action="{{ route($actionAddImage,['product_id'=>$item->id]) }}">
                            @csrf
                            <div class="box-body">
                                <div class="form-group">
                                    <label>Thêm nhiều ảnh</label>
                                    <input type="file" name="thumb[]" id="thumb" accept="image/*" multiple="true"><br>
                                    <p>Lưu ý: Chọn ảnh vuông để hiển thị đẹp nhất</p>
                                </div>
                            </div>
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary btn-flat">Xác nhận</button>
                            </div>
                        </form>
                    </div>
                </div>
            @endif
        </div>
    </section>
@stop
@section('css')
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('backend/bower_components/select2/dist/css/select2.min.css') }}">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="{{ asset('backend/plugins/iCheck/all.css') }}">
@stop
@section('script')
    <!-- Select2 -->
    <script src="{{ asset('backend/bower_components/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('backend/bower_components/ckeditor/ckeditor.js') }}"></script>
    <!-- iCheck 1.0.1 -->
    <script src="{{ asset('backend/plugins/iCheck/icheck.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('.select2').select2();
            CKEDITOR.replace('editor1',{
                uiColor : '#57B900',
                language : 'vi',
                height : '500',
                filebrowserBrowseUrl: '{{ asset('backend/plugins/ckfinder/ckfinder.html') }}',
                filebrowserImageBrowseUrl: '{{ asset('backend/plugins/ckfinder/ckfinder.html?type=Images') }}',
                filebrowserFlashBrowseUrl: '{{ asset('backend/plugins/ckfinder/ckfinder.html?type=Flash') }}',
                filebrowserUploadUrl: '{{ asset('backend/plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files') }}',
                filebrowserImageUploadUrl: '{{ asset('backend/plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images') }}',
                filebrowserFlashUploadUrl: '{{ asset('backend/plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash') }}'
            });
            $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
                checkboxClass: 'icheckbox_minimal-blue',
                radioClass   : 'iradio_minimal-blue'
            });
        });
    </script>
@stop
