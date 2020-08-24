<script src='{{ asset('demo/js/jquery-1.9.1.min.js') }}'></script>
<script src='{{ asset('demo/js/jquery.tinycarousel.js') }}'></script>
<script src='{{ asset('demo/js/jquery.easing.1.3.js') }}'></script>
<script src='{{ asset('demo/js/jquery.fitvids.js') }}'></script>
<script src='{{ asset('demo/js/slippry.min.js') }}'></script>
<script src='{{ asset('demo/js/jquery.fancybox.js') }}'></script>

@if (app()->getLocale() == 'ar')
    <script src='{{ asset('demo/js/jquery.bxslider-ar.js') }}'></script>
@else
    <script src='{{ asset('demo/js/jquery.bxslider.js') }}'></script>
@endif

@include('site.partials.clients-js')