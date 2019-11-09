<div class="panel panel-default panel-primary">
    <div class="panel-heading"><b>DANH MỤC</b></div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-12">
                <?php
                    if(isset($posts) && !isset($cate)){
                        $url = route('allPost');
                    }else if(isset($posts) && isset($cate)){
                        $url = route('allCategoryPost',['slug' => $cate->slug]);
                    }else if(isset($products) && !isset($cate)){
                        $url = route('allProduct');
                    }else if(isset($products) && isset($cate)){
                        $url = route('allCategoryProduct',['slug' => $cate->slug]);
                    }
                ?>
                <form action="{{$url}}" method="get">
                    <div class="row">
                        <div class="col-sm-9">
                            <div class="form-group">
                                <input type="text" class="form-control flat" name="name" placeholder="{{isset($posts) ? 'Tìm kiếm bài thi công...' : 'Tìm kiếm sản phẩm...'}}" required>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <button type="submit" class="flat btn btn-primary"><i class="fa fa-search" aria-hidden="true"></i></button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div style="clear: both">
            @if(isset($categorys) && count($categorys) > 0)
                @foreach($categorys as $category)
                    <p style="padding: 8px 10px;" class="{{(isset($cate) && $category->slug == $cate->slug) ? 'bg-success' : ''}}">
                        <a href="{{isset($products) ? route('allCategoryProduct',['slug' => $category->slug]) : route('allCategoryPost',['slug' => $category->slug]) }}">
                            <i class="fa fa-ticket" aria-hidden="true"></i> {{$category->name}}
                        </a>
                        @if((isset($cate) && $category->slug == $cate->slug))
                            <i class="fa fa-hand-o-right pull-right" aria-hidden="true"></i>
                        @endif
                    </p>
                @endforeach
            @else
                <p style="padding: 8px 10px;">
                    Hiện tại chưa có danh mục
                </p>
            @endif
            </div>
        </div>
    </div>
</div>