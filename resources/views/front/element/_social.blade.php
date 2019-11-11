<div class="icon-bar3">
    @if(isset($website['fanpage']))
        <a href="{{$website['fanpage']}}" class="facebook"><i class="fa fa-facebook"></i></a>
    @endif
    @if(isset($website['google']))
        <a href="{{$website['google']}}" class="google"><i class="fa fa-google"></i></a>
    @endif
    @if(isset($website['youtube']))
        <a href="{{$website['youtube']}}" class="youtube"><i class="fa fa-youtube"></i></a>
    @endif
</div>