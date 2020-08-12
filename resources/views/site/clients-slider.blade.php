<section class="clint_logos">
    <div class="clint_logo_header"></div>
    <h3>{{ 'العملاء' }}</h3>
    <div id="slider1" class="clint_logos_slider">
        <a class="buttons prev" href="#">
            <img src="{{ asset('demo/img/prvbtn.png') }}" alt="prev"></a>
        <div class="viewport">
            <ul class="overview" style="width: 33522px; left: -14208px;">
                @foreach ($clients as $client)
                    <li>
                        <img src="{{$client->image_path}}" alt="">
                    </li>
                @endforeach
            </ul>
        </div>
        <a class="buttons next" href="#">
            <img src="{{ asset('demo/img/nextbnt.png') }}" alt="next"></a>
        <div class="clear"></div>
    </div>
    <div class="clear"></div>
</section>