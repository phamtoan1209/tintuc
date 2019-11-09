<label for="">
    <form action="{{route($actionDelete,['id'=>$item->id])}}" method="post" class="form-delete">
        @csrf
        <a href="javascript:void(0)" class="btn btn-xs btn-danger btn-flat btn-delete" title="Delete">
            <i class="fa fa-times"></i> Xóa
        </a>
    </form>
</label>