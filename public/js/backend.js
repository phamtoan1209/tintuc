$(document).ready(function(){
    // //datepicker
    // $('#datepicker').datepicker({
    //     autoclose: true
    // });
    // //select of select2
    // $('.select2').select2();
    // //daterange picker
    // $('#reservation').daterangepicker();
    // //checkbox of icheck
    // $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
    //     checkboxClass: 'icheckbox_minimal-blue',
    //     radioClass   : 'iradio_minimal-blue'
    // });
    // // ck editor
    // CKEDITOR.replace('editor1');
    // CKEDITOR.config.uiColor = '#57B900';
    // CKEDITOR.config.language = 'vi';
    // CKEDITOR.config.filebrowserBrowseUrl = '../../ckfinder/ckfinder.html';
    // CKEDITOR.config.filebrowserImageBrowseUrl = '../../ckfinder/ckfinder.html?Type=Images';
    // CKEDITOR.config.filebrowserUploadUrl  = '/uploader/upload.php';
    // CKEDITOR.config.filebrowserImageUploadUrl  = '/uploader/upload.php?type=Images';

    //delete item
    $('.btn-delete').on('click',function () {
        var buttonDel = $(this);
        $.confirm({
            title: 'Xác nhận!',
            content: 'Bạn chắc chắn muốn xóa?',
            buttons: {
                confirm:{
                    text: "Tôi chắc chắn",
                    btnClass: 'btn-blue',
                    action :  function () {
                        buttonDel.parent().submit();
                    }
                },
                cancel: {
                    text: 'Hủy',
                    action :  function () {
                    }
                },
            }
        });
    });

    //block item
    $('.btn-block').on('click',function () {
        var buttonDel = $(this);
        var choose = buttonDel.attr('data');
        $.confirm({
            title: 'Confirm!',
            content: 'Are you sure to '+choose+'?',
            buttons: {
                confirm:{
                    text: "I'm Sure.",
                    btnClass: 'btn-blue',
                    action :  function () {
                        buttonDel.parent().submit();
                    }
                },
                cancel: {
                    text: 'Cancel',
                    action :  function () {
                    }
                },
            }
        });
    });


    // disable class alert_message
    setTimeout(function(){
        $('.alert-message').hide();
    }, 3000);
});