@extends('layouts.site')

@section('content')
    <div class="container mt-3 mb-5">
        <div class="row">
            <h1>@lang('site.clients')</h1>
        </div>
        <div class="row">
            @foreach ($clients as $client)
                <div class="col-sm-6 col-md-3 col-lg-3">
                    <div class="card">
                        <img class="card-img" src="{{ $client->image_path }}" alt="Card image">
                    </div>
                </div>
            @endforeach
        </div>
        <div class="row">
            <div class="d-flex justify-content-center">
                {!! $clients->links() !!}
            </div>
        </div>
    </div>
@endsection
