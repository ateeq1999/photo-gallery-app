@extends('layouts.site')

@section('content')
    <div class="container">
        <div class="content_wrap">
            @if ($category)
                <div class="row">
                    <div class="page_header">
                        <h1>{{ $category->name }}</h1>
                    </div>
                </div>
                <!--page_header-->
                <div class="row">
                    <h2 class="page_h2">{!!$category->description!!}</h2>
                </div>
            @endif
            <br>
            <div class="product_row" style="align-items: flex-start">
                @if (count($products) > 0)
                    @foreach ($products as $product)
                        <div class="product_box">
                            <div class="product_thumb">
                                <div class="product_img">
                                    <a class="fancybox" rel="gallery1" href="{{ route('site.products.show', $product->id ) }}">
                                        <img src="{{ $product->image_path }}" alt="CY1-22" class="img_responsive">
                                    </a>
                                </div>
                                <!--product_img-->
                                <div class="product_intro">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-9 col-lg-9">
                                            @lang('site.product-code') : {{ $product->code }}
                                        </div>
                                        <div class="col-sm-12 col-md-3 col-lg-3" style="align-items: flex-end">
                                            <a href="{{ route('site.products.show', $product->id ) }}" class="btn btn-primary" style="background-color:#3f5990;border-color: #3f5990">@lang('site.more') </a>
                                        </div>
                                    </div>
                                </div>
                                <!--product_intro-->
                            </div>
                            <!--product_thumb-->
                        </div>
                    @endforeach
                @endif
                <!--product_box-->
                <div class="clear"></div>
            </div>
            <!--product_row-->
        </div>
        @if (count($products) > 0)
            <div class="row">
                <div class="d-flex justify-content-center">
                    {!! $products->links() !!}
                </div>
            </div>
        @endif
    </div>
@endsection
