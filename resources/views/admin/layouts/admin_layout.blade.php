<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    @yield('meta')

    <title>{{config('app.name')}}</title>
    {{--core css--}}
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
    <link href="{{url('public/assets/admin/icons/icomoon/styles.css')}}" rel="stylesheet" type="text/css">
    <link href="{{url('public/assets/admin/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{url('public/assets/admin/css/bootstrap_limitless.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{url('public/assets/admin/css/layout.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{url('public/assets/admin/css/components.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{url('public/assets/admin/css/colors.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{url('public/assets/css/fonts.css')}}" rel="stylesheet" type="text/css">
    {{--end core css--}}
    {{--custom css--}}
    @yield('css')
    {{--end custom css--}}

    {{--core js--}}
    <script src="{{url('public/assets/admin/js/main/jquery.min.js')}}"></script>
    <script src="{{url('public/assets/admin/js/main/bootstrap.bundle.min.js')}}"></script>
    <script src="{{url('public/assets/admin/js/plugins/loaders/blockui.min.js')}}"></script>
    {{--end core js--}}

    {{--custom js--}}
    @yield('js')
    {{--end custom js--}}

    <script src="{{url('public/assets/admin/js/app.js')}}" type="text/javascript"></script>

</head>

<body class="text-black-50">
@yield('main_data')
</body>
</html>
