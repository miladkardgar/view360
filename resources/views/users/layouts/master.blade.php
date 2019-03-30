<!doctype html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>View 360</title>

    <link rel="stylesheet" href="{{ url('/public/assets/css/bootstrap-rtl.css')}}">
    <link rel="stylesheet" href="{{ url('/public/assets/css/jquery.scrollbar.css')}}">
    <link rel="stylesheet" href="{{ url('/public/assets/css/leaflet.css')}}">
    <link rel="stylesheet" href="{{ url('/public/assets/css/style.css')}}">
    <link rel="stylesheet" href="{{ url('/public/assets/webfonts/fontawsome/css/all.css') }}">

    @yield('style')
</head>
<body class="rtl">

<!-- WRAPPER
=====================================================================================================================-->
<div class="ts-page-wrapper ts-has-bokeh-bg" id="page-top">
    @include('users.layouts.nav')
    @yield('body')
    @include('users.layouts.footer')
</div>
<!--end page-->
<script type="text/javascript" src="{{url('/public/assets/js/jquery-3.3.1.min.js')}}"></script>
<script type="text/javascript" src="{{url('/public/assets/js/popper.min.js')}}"></script>
<script type="text/javascript" src="{{url('/public/assets/js/bootstrap.js')}}"></script>
<script type="text/javascript" src="{{url('/public/assets/js/owl.carousel.min.js')}}"></script>
<script type="text/javascript" src="{{url('/public/assets/js/dragscroll.js')}}"></script>
<script type="text/javascript" src="{{url('/public/assets/js/jquery.scrollbar.min.js')}}"></script>
<script type="text/javascript" src="{{url('/public/assets/js/leaflet.js')}}"></script>
<script type="text/javascript" src="{{url('/public/assets/js/leaflet.markercluster.js')}}"></script>
<script type="text/javascript" src="{{url('/public/assets/js/custom.js')}}"></script>
<script type="text/javascript" src="{{url('/public/assets/js/map-leaflet.js')}}"></script>
@yield('script')

</body>
</html>