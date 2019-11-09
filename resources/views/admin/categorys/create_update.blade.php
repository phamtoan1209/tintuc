@extends('admin._partials.master')
@section('title','Admin - Create - Update '.$breadcrumb)
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Thêm - Sửa - {{$breadcrumb}}</h3>
                    </div>
                    <!-- form start -->
                    <form role="form" enctype="multipart/form-data" method="post" action="{{ isset($item) ? route($actionUpdate,['id'=>$item->id]) : route($actionCreate) }}">
                        @csrf
                        <div class="box-body">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-8">
                                        <label for="exampleInputFile">Ảnh danh mục</label>
                                        <input type="file" name="thumb" id="thumb" accept="image/*"><br>
                                        <p>Lưu ý: Chọn ảnh kích thước 1920x1080 để có hiển thị tốt nhất</p>
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
                                <select name="type" id="type" class="form-control">
                                    <option value=""> -- Chọn danh mục --</option>
                                    <option value="{{$typeProduct}}" {{(isset($item) && $item->type == $typeProduct ) ? 'selected="selected"' : '' }}>Danh mục sản phẩm</option>
                                    <option value="{{$typePost}}" {{(isset($item) && $item->type == $typePost ) ? 'selected="selected"' : '' }}>Danh mục tin tức</option>
                                </select>
                                {!! $errors->first('type') ? '<p class="text-danger">'. $errors->first('type') .'</p>' : ''!!}
                            </div>
                            <div class="form-group parent parent-post @if(isset($item) && $item->type != $typePost) hidden @endif">
                                <label>Danh mục cha</label>
                                {!! Form::select(
                                    'parent_id',
                                    $parentPost,
                                     isset($item) ? $item->parent_id : 0 ,
                                    [
                                        'class' => 'form-control',
                                        'placeholder' => '-- Là danh mục cha --',
                                        'disabled' => isset($item) && $item->type == $typePost ? false : true
                                    ]
                                ) !!}
                                {!! $errors->first('parent_id') ? '<p class="text-danger">'. $errors->first('parent_id') .'</p>' : ''!!}
                            </div>
                            <div class="form-group parent parent-product @if(isset($item) && $item->type != $typeProduct) hidden @endif">
                                <label>Danh mục cha</label>
                                {!! Form::select(
                                    'parent_id',
                                    $parentProduct,
                                    isset($item) ? $item->parent_id : 0 ,
                                    [
                                        'class' => 'form-control',
                                        'placeholder' => '-- Là danh mục cha --',
                                        'disabled' => isset($item) && $item->type == $typeProduct ? false : true
                                    ]
                                ) !!}
                                {!! $errors->first('parent_id') ? '<p class="text-danger">'. $errors->first('parent_id') .'</p>' : ''!!}
                            </div>
                            <div class="form-group">
                                <label>Tên danh mục</label>
                                {!! Form::text('name', old( 'name',isset($item) ? $item->name : ''), ['class' => 'form-control','placeholder'=>"Tên danh mục"]) !!}
                                {!! $errors->first('name') ? '<p class="text-danger">'. $errors->first('name') .'</p>' : ''!!}
                            </div>
                            <div class="form-group">
                                <label>Mô tả</label>
                                {!! Form::text('description', old( 'description',isset($item) ? $item->description : ''), ['class' => 'form-control','placeholder'=>"Mô tả danh mục"]) !!}
                                {!! $errors->first('description') ? '<p class="text-danger">'. $errors->first('description') .'</p>' : ''!!}
                            </div>
                            <div class="form-group">
                                <label>Nổi bật</label>
                                {!! Form::select('hot',[0 => 'NO', 1 => 'YES'], isset($item) ? $item->hot : 0 , ['class' => 'form-control']) !!}
                                {!! $errors->first('hot') ? '<p class="text-danger">'. $errors->first('hot') .'</p>' : ''!!}
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
            @if(!isset($item))
                $('.parent').hide();
            @endif
            $('select[name="type"]').on('change',function () {
                let type = $(this).val();
                $('.parent').hide();
                if(type == 1){
                    $('.parent-post').removeClass('hidden').show();
                    $('.parent-post').fadeIn();
                    $('.parent-post').find('select').removeAttr('disabled');
                    $('.parent-product').find('select').attr('disabled','disabled');
                }else{
                    $('.parent-product').removeClass('hidden').show();
                    $('.parent-product').fadeIn();
                    $('.parent-product').find('select').removeAttr('disabled');
                    $('.parent-post').find('select').attr('disabled','disabled');
                }
            });
        });
    </script>
@stop
