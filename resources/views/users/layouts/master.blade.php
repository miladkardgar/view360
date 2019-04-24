<!doctype html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>view360 - @yield('title')</title>
    @yield('meta')

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="BREED HOSTING">
    <meta name="author" content="view360.ir">
    <link rel="icon" href="favicon.ico">

    <meta name="keywords" content="املاک"/>
    <meta name="description" content="املاک 360">
    <meta name="author" content="view360.ir">


    <meta property="og:title" content="املاک 360"/>
    <meta property="og:description" content="املاک 360"/>

    <meta property="og:locale" content="fa_IR"/>
    <meta property="og:type" content="website"/>
    <meta property="og:url" content="https://view360.ir"/>
    <meta property="og:site_name" content="shetabsystem"/>
    <meta property="article:publisher" content="https://facebook.com/view360"/>
    <meta property="og:image" content="http://view360.ir/public/assets/img/logo.png"/>

    <meta name="distribution" content="Global"/>
    <meta name="generator" content="view360"/>
    <meta name="copyright" content="Copyright (2019) (c) view360 Co."/>
    <meta name="classification" content="02"/>
    <meta name="rating" content="General"/>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta http-equiv="Content-Style-Type" content="text/css"/>

    <meta name="author" content="view 360"/>
    <meta name="version" content="2.0.0"/>

    <meta name="robots" content="index, follow"/>


    <meta name="googlebot" content="index, follow"/>
    <meta name="revisit-after" content="1 days"/>


    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>


    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no">
    <meta name="theme-color" content="#403e3e">


    <link rel="stylesheet" href="{{ url('/public/assets/css/bootstrap-rtl.css?v=1')}}">
    <link rel="stylesheet" href="{{ url('/public/assets/css/jquery.scrollbar.css?v=1')}}">
    <link rel="stylesheet" href="{{ url('/public/assets/css/leaflet.css?v=1')}}">
    <link rel="stylesheet" href="{{ url('/public/assets/css/style.css?v=1')}}">
    <link rel="stylesheet" href="{{ url('/public/assets/webfonts/fontawsome/css/all.css?v=1') }}">

    @yield('style')
</head>
<body class="rtl">

<!-- WRAPPER
=====================================================================================================================-->
<div class="ts-page-wrapper ts-has-bokeh-bg" id="page-top">
    @include('users.layouts.nav')
    @include('users.session')
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
<script type="text/javascript" src="{{url('/public/assets/js/sweet.min.js')}}"></script>
@yield('script')

</body>
</html>
