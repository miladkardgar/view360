@extends('admin.layouts.admin_content_layout')
@section('title','ارتباط با ما |‌ ' .$conInfo->name)
@section('meta')
@stop
@section('css')
@stop
@section('js')
@stop
@section('content')
    <div class="card">
        <div class="card-body text-black-50">
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="row">
                        @if(isset($conInfo->name))
                            <div class="col-12 col-md-12 mb-3">
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <strong>نام و نام خانوادگی</strong>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <span>{{$conInfo->name}}</span>
                                    </div>
                                </div>
                            </div>
                        @endif
                        @if(isset($conInfo->email))
                            <div class="col-12 col-md-12 mb-3">

                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <strong>ایمیل</strong>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <a class="btn btn-xs btn-outline-dark btn_ChangeRole" href="mailto:{{$conInfo->email}}">{{$conInfo->email}}</a>
                                    </div>
                                </div>
                            </div>
                        @endif
                        @if(isset($conInfo->phone))
                            <div class="col-12 col-md-12 mb-3">

                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <strong>شماره تماس</strong>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <span>{{$conInfo->phone}}</span>
                                    </div>
                                </div>
                            </div>
                        @endif
                        @if(isset($conInfo->file_id))
                            <div class="col-12 col-md-12 mb-3">
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <strong>شماره فایل</strong>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <a href="/admin/estate/edit/{{$conInfo->file_id}}" target="_blank" class="btn btn-xs btn-outline-dark btn_ChangeRole">{{$conInfo->file_id}}</a>

                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <section>

                <hr>
                <div class="row">
                    @if(isset($conInfo->subject))
                        <div class="col-12 col-md-4 mb-3">
                            <div class="row">
                                <div class="col-12 col-md-2">
                                    <strong class="">موضوع</strong>
                                </div>
                                <div class="col-12 col-md-12 mt-3">
                                    <p class="bg-light p-3">{{$conInfo->subject}}</p>
                                </div>
                            </div>
                        </div>
                    @endif
                    <hr>
                    @if(isset($conInfo->message))
                        <div class="col-12 col-md-12 mb-3">
                            <div class="row">
                                <div class="col-12 col-md-2">
                                    <strong>متن</strong>
                                </div>
                                <div class="col-12 col-md-12 mt-3">
                                    <p class="bg-light p-3">{{$conInfo->message}}</p>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </section>

        </div>
    </div>
@endsection
