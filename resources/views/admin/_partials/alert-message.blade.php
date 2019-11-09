@if(session()->has('alert_message'))
    <div class="col-xs-8 col-md-4 pull-right alert-message">
        <div class="alert alert-{{ session()->has('type_message') ? session()->get('type_message') : 'success' }} alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-{{session()->has('type_message') && session()->get('type_message') == 'danger' ? 'ban' : 'check'}}"></i> Thông báo!</h4>
            {{ session()->get('alert_message') }}
        </div>
    </div>
@endif