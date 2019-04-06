@extends('admin.layouts.admin_content_layout')
@section('meta')
    <meta name="_token" content="{{csrf_token()}}"/>
@stop
@section('css')
    <link rel="stylesheet" href="{{ url('public/assets/admin/css/leaflet.css')}}">

    <style>
        #mapid {
            height: 480px;
        }
    </style>
@stop
@section('js')
    <script type="text/javascript"
            src="{{url('public/assets/admin/js/plugins/uploaders/fileinput/purify.min.js')}}"></script>
    <script type="text/javascript"
            src="{{url('public/assets/admin/js/plugins/uploaders/fileinput/sortable.min.js')}}"></script>
    <script type="text/javascript"
            src="{{url('public/assets/admin/js/plugins/uploaders/fileinput/fileinput.min.js')}}"></script>
    <script type="text/javascript"
            integrity="sha512-QVftwZFqvtRNi0ZyCtsznlKSWOStnDORoefr1enyq5mVL4tmKB3S/EnC3rRJcxCPavG10IcrVGSmPh6Qw5lwrg=="
            crossorigin="" src="{{url('public/assets/admin/js/leaflet.js')}}"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });

        function loadPage(id) {
            $.ajax({
                url: "{{url('/admin/estates/ajax/getInfo')}}",
                data: {id: id},
                method: "POST",
                success: function (result) {
                    $("#resData").html(result);
                },
                error() {
                    console.log("error get area list");
                }
            })
        }

        var oldPage ="{{Request::old('data_id')}}";
        if(oldPage.length>0){
            loadPage(oldPage);
        }else{
            loadPage(1);
        }
    </script>
@stop
@section('content')
    <div class="container-fluid text-black-50">
        <div class="card">
            <div class="card-body">
                <form action="/admin/estates/ajax/add" method="post" enctype="multipart/form-data">

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li class="text-danger">{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    {{csrf_field()}}
                    <ul class="nav nav-tabs nav-tabs-highlight nav-justified">
                        @php $active = 'active' @endphp
                        @foreach($datas as $data)
                            <li class="nav-item">
                                <a href="javascript:;"
                                   onclick="loadPage({{$data->id}})"
                                   class="nav-link {{$active}}"
                                   data-toggle="tab">{{$data->title}}</a></li>
                            @php $active='' @endphp
                        @endforeach
                    </ul>
                    <div class="tab-content text-black-50">
                        <div id="resData">
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">ذخیره اطلاعات</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
