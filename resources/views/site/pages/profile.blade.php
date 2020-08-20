@extends('layouts.site')

@section('content')
    <div class="container mt-3 mb-5">
        <section id="wrapper">
    
            <div class="content_wrap container">
                @if ($profile)
                    <div class="page_header">
                        <div class="row">
                            <h1> @lang('site.our_profile') </h1>
                        </div>
                    </div>
                    <!--page_header-->
                    <div class="row">
                        <h2 class="page_h2">{{ $profile->title }}</h2>
                    </div>
                    <!--we_change_block-->
                    <div class="row mt-5">
                        <div class="col-sm-12 col-md-6 col-lg-6">
                            <blockquote class="blockquote text-right">
                                <p class="mb-0">
                                    {!!$profile->bio!!}
                                </p>
                            </blockquote>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-6">
                            <div id="we_change_block_img">
                                <img src="{{ $profile->image_path }}" alt="{{ $profile->title }}" class="img_responsive">
                            </div>
                        </div>
                    </div>
                @endif

                <div class="row mt-5">
                    @if (count($profile->settings) > 0)
                        @foreach ($profile->settings as $setting)
                            <div class="col-sm-12 col-md-4 col-lg-4">
                                <div class="product_box client_prof">
                                    <h5 class="branch_heading red_color">{{ $setting->title }}</h5>
                                    <p>
                                        <span>{!!$setting->description!!}</span>
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    @endif
                    <!--product_box-->
                    <div class="clear"></div>
                </div>
                
                <!--product_row-->
                <div id="get_inspired">
                    <h4>@lang('site.get_inspired')</h4>
                    <img src="{{ asset('demo/img/view-products.jpg') }}" alt="View Our Products">
                </div>
                <!--get_inspired-->
                <div class="product_row">
                    @foreach ($categories as $category)
                        <div class="product_list">
                            <div class="thumbnail">
                                <div class="caption">
                                    <a href="#">
                                        {{ $category->name }} </a>
                                </div>
                                <img src="{{ $category->image_path }}" alt="{{ $category->name }}" class="img_responsive" style="height: 168px">
                            </div>
                        </div>
                    @endforeach
                        
                    <div class="clear"></div>
                </div>
                <!--product_row-->
            </div>
            <!--content_wrap-->
        
        </section>

    </div>
@endsection
