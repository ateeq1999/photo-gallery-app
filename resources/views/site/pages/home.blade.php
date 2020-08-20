@extends('layouts.site')

@section('content')
    <section class="home_service">
        <div class="row">
            <div class="col-sm-12 col-md-7 col-lg-8">
                <div class="container">
                    @if (count($categories) > 0)
                        @include('site.home-service-left', ['categories' => $categories])
                    @endif
                </div>
            </div>
            <div class="col-sm-12 col-md-5 col-lg-4">
                @include('site.home-service-awards')
            </div>
        </div>
        <div class="clear"></div>
    </section>
    <div class="row">
        @if (count($clients) > 0)
            @include('site.clients-slider', [ 'clients' => $clients ])
        @endif
    </div>
@endsection




