<link href="{{ asset('demo/css/style_new.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('demo/css/media.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('demo/css/tinycarousel.css') }}" rel="stylesheet" type="text/css" />
<link href='{{ asset('demo/css/jquery.fancybox.css') }}' rel="stylesheet" />
<link href="{{ asset('demo/css/jquery.bxslider.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('demo/css/slippry.css') }}" rel="stylesheet" type="text/css" />

@if (app()->getLocale() == 'ar')
    <link rel="stylesheet" href="{{ asset('dashboard_files/css/font-awesome-rtl.min.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Cairo:400,700" rel="stylesheet">
    <style>
        body, h1, h2, h3, h4, h5, h6 {
            font-family: 'Cairo', sans-serif !important;
        }
        /* body{
            background-color: #FFF !important;
        } */
        *{
            font-family: 'Cairo', sans-serif !important;
            direction: rtl !important;
            text-align: right;
        }
    </style>
@else
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <link rel="stylesheet" href="{{ asset('dashboard_files/css/font-awesome.min.css') }}">
@endif

<link rel="stylesheet" href="{{ asset('demo/css/clients.css') }}">
