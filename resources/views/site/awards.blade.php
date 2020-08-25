<div class="awards">
    <div class="award_header"><a href="/office/furniture/awards">AWARDS</a> </div>
    <div class="award_logos">
        <div class="bx-wrapper" style="max-width: 100%;">
            <div class="bx-viewport" style="width: 100%; overflow: hidden; position: relative; height: 178px;">
                <ul class="bxslider" style="width: 1815%; position: relative; transition-duration: 0.5s; transform: translate3d(-510px, 0px, 0px);">
                    @foreach ($awards as $award)
                        <li style="{{ app()->getLocale() == 'ar' ? 'float: right; list-style: none; position: relative; width: 254px;' : 'float: left; list-style: none; position: relative; width: 254px;' }}" class="bx-clone">
                            <div class="bxslider_div_bx">
                                <a class="fancybox" rel="gallery1" href="#">
                                    <img src="{{ $award->image_path }}" alt="Awards" class="img_responsive">
                                </a>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="bx-controls bx-has-pager bx-has-controls-direction bx-has-controls-auto">
                <div class="bx-pager bx-default-pager">
                    @foreach ($awards as $award)
                        <div class="bx-pager-item">
                            @if ($award->id == 1)
                                <a href="" data-slide-index="{{ $award->id-1 }}" class="bx-pager-link active">{{ $award->id }}</a>
                            @else
                                <a href="" data-slide-index="{{ $award->id-1 }}" class="bx-pager-link">{{ $award->id }}</a>
                            @endif
                        </div>
                    @endforeach
                    <div class="bx-controls-direction">
                        <a class="bx-prev" href="">Prev</a>
                        <a class="bx-next" href="">Next</a>
                    </div><div class="bx-controls-auto">
                        <div class="bx-controls-auto-item">
                            <a class="bx-start active" href="">Start</a>
                        </div>
                        <div class="bx-controls-auto-item">
                            <a class="bx-stop" href="">Stop</a>
                        </div>
                    </div>
                </div>
            </div>
        <div class="clear"></div>
    </div>
    <div class="clear"></div>
</div>
