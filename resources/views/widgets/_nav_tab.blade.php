<?php
use App\Model\Category;
$prefix = isset($cate) && $cate->type == Category::TYPE_POST ? 'tin-tuc' : 'san-pham';
?>
<section class="form-group">
    <div class="container">
        @if(isset($categorys) && !empty($categorys))
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                @foreach($categorys as $item)
                    @if(isset($cate) && ($cate->id == $item['id'] || $cate->parent_id == $item['id']) )
                        @foreach($item['childs'] as $childCategory)
                            <li class="nav-item">
                                <a class="nav-link {{ isset($cate) && $childCategory['id'] == $cate->id ? 'active' : ''}}" href="{{url($prefix.'/danh-muc/'.$childCategory['slug'])}}" >{{$childCategory['name']}}
                                </a>
                            </li>
                        @endforeach
                    @endif
                @endforeach
            </ul>
        @endif
    </div>
</section>