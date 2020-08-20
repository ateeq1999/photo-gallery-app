<article id="home_service_left">
    @if (count($categories) > 0)
        @foreach ($categories as $category)
            <div align="left" class="home_service_block">
                <div class="home_service_icon">
                    <img src="{{ $category->image_path }}" alt="service">
                </div>
                <div class="home_service_content">
                    <h3>{{ $category->name }}</h3>
                    <p>
                        <span>{!!$category->description!!}</span>
                        <a href="{{ route('site.category_products', $category->id) }}">@lang('site.more')</a>
                    </p>
                </div>
                <div class="clear"></div>
            </div>
        @endforeach    
    @endif
    <div class="clear"></div>
</article>