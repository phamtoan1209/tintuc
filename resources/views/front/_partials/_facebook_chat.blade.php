<div class="fb-customerchat"
     attribution=setup_tool
     page_id="100177834781513"
     theme_color="#fa3c4c"
     logged_in_greeting="Xin chào, bạn muốn giúp đỡ?"
     logged_out_greeting="Xin chào, bạn muốn giúp đỡ?">
</div>
<!-- Load Facebook SDK for JavaScript -->
<script>
    window.fbAsyncInit = function() {
        FB.init({
            xfbml            : true,
            version          : 'v3.3'
        });
    };
    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>
