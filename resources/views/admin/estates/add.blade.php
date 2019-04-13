@extends('admin.layouts.admin_content_layout')
@section('meta')
@stop
@section('css')
@stop
@section('js')
@stop
@section('content')
    <div class="container-fluid text-black-50">
        <div class="card">
            <div class="card-body">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li class="text-danger">{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @foreach($datas as $data)
                    <a href="/admin/estate/add/{{$data->id}}" class="btn btn-outline-info p-4 m-2">{{$data->title}}</a>
                @endforeach
            </div>
        </div>
    </div>
@endsection
