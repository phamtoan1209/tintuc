<section>
    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            @if(isset($slides))
                <?php $j=0 ;?>
                @foreach($slides as $slide)
                    <li data-target="#carousel-example-generic" data-slide-to="{{$j}}" class="<?=$j == 0 ? 'active' : ''?>"></li>
                <?php $j++ ;?>
                @endforeach
            @endif
        </ol>
        <div class="carousel-inner">
            @if(isset($slides))
                <?php $i=0 ;?>
                @foreach($slides as $slide) <?php $i++ ;?>
                    <div class="item <?=$i == 1 ? 'active' : ''?>">
                        <center>
                            <img class="img-responsive" src="{{asset($slide->thumb)}}"  >
                        </center>
                    </div>
                @endforeach
            @endif
        </div>
        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
        </a>
        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
        </a>
    </div>
</section>