@extends('layouts.site')

@section('content')
    <div class="container">
        <div class="content_wrap">
            @if ($product)
                <div class="row">
                    <div class="page_header">
                        <h1>{{ $product->name }}</h1>
                    </div>
                </div>
                <!--page_header-->
                <div id="product_det_img">
                    <img src="{{ $product->image_path }}" class="img_responsive" alt="{{ $product->code }}">
                </div>
                <div id="product_desc">
                    <h4 class="heading">{{ $product->code }}</h4>
                    <div class="row">
                        <div class="col-6">
                            @lang('site.product-code')
                        </div>
                        <div class="col-6">
                            {{ $product->code }}
                        </div>
                    </div>
                    <p>{!!$product->description!!}</p>
                    <a href="{{ redirect()->back() }}" class="submit_btn">@lang('site.list-back') </a>
                </div>
                <!--product_desc-->
                <div class="clear"></div>
            @endif
        </div>
    </div>
@endsection
