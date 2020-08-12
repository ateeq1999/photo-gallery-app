@extends('layouts.site')

@section('content')
    <div class="container mt-3 mb-5">
        <section id="wrapper">
            <div class="content_wrap container">
                <div class="page_header">
                    <h1>@lang('site.contact-header')</h1>
                </div>
                <!--page_header-->
                <h2 class="page_h2 mb-5">{{ $info->bio }}</h2>
                <p class="change_block_txt mb-5">
                    {!!$info->description!!}
                </p>
            
                <div class="row mt-5">
                    @include('site.partials.contact-form')
                    @include('site.partials.contact-info')
                </div>
            
                <!--contact_address-->
                <div class="clear"></div>
                <br>
                
                <img src="{{ asset('demo/img/Al-Hawai-Middle-Banner-Contact-Us-Image.png') }}" alt="Map" height="300" width="100%" style="border: 0; margin-bottom: 20px;">
                <br>
                <div class="page_header">
                    <h1>@lang('site.office-addresses')</h1>
                </div>
                <!--page_header-->
                <div class="product_row">
                    @foreach ($info->locations as $location)
                        <div class="product_box">
                            <div class="product_thumb">
                                <h5 class="branch_heading">{{ $location->name }}</h5>
                                <p class="address_line">
                                    {!!$location->address!!}
                                    {{$location->email}}<br>
                                    @lang('site.tel-no') : {{$location->phone}}<br>
                                    @lang('site.fax-no') : {{$location->fax}}
                                </p>
                                <br>
                                {{-- <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d28863.396500647257!2d55.347797!3d25.273123!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xacaf11e7f46c92dd!2sAl+Hawai+Office+Furniture+And+Equipment+L.L.C+Head+Office!5e0!3m2!1sen!2sae!4v1506235082401&quot; width=&quot;600&quot; height=&quot;450&quot; frameborder=&quot;0&quot; style=&quot;border:0&quot; allowfullscreen></iframe>" width="100%" height="235" frameborder="0" style="border: 0" allowfullscreen=""></iframe> --}}
                                <iframe src="{{ $location->map }}" width="100%" height="235" frameborder="0" style="border: 0" allowfullscreen=""></iframe>
                            </div>
                            <!--product_thumb-->
                        </div>
                    @endforeach
            
                    <div class="clear"></div>
                </div>
            </div>
        </section>
    </div>
@endsection
