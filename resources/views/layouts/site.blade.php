<!DOCTYPE html>
<html dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="Description" content="Al Hawai Office Furniture &amp; Equipment Co. L.L.C. has proudly served many clients with high quality furniture and equipment." /><meta name="Keywords" />
    <title>Site</title>
    {{-- <title>@lang('site.site')</title> --}}
    <link rel="shortcut icon" type="image/x-icon" href="../../images/favicon.ico" />
    @include('site.partials.csslinks')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/app.js') }}"></script>
</head>
<body>
    @include('site.partials.navbar')
    <section id="wrapper">
        @include('site.partials.home-banner')
        @yield('content')
    </section>
    @include('site.partials.footer')
    @include('site.partials.jslinks')
</body>
</html>