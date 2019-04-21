@extends('admin.layouts.admin_content_layout')
@section('meta')
@stop
@section('css')
@stop
@section('js')
@stop
@section('content')
    <section class="text-black-50">
        <div class="card">
            <div class="card-body">
                @include('admin.errors')
                <form action="/admin/users/store" method="post" id="frm_addUser">
                    {{csrf_field()}}
                    <div class="row">
                        <div class="col-3">
                            <div class="form-group">
                                <label for="name">نام</label>
                                <input type="text" name="name" id="name" class="form-control" required value="{{old('name')}}">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="family">نام خانوادگی</label>
                                <input type="text" name="family" id="family" required class="form-control" value="{{old('family')}}">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="meCode">شماره ملی</label>
                                <input type="number" name="meCode" id="meCode" class="form-control" value="{{old('meCode')}}">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="email">ایمیل</label>
                                <input type="email" name="email" id="email" required class="form-control" value="{{old('email')}}">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="email">شماره همراه</label>
                                <input type="number" name="mobile" id="mobile" required class="form-control" value="{{old('mobile')}}">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="email">رمز عبور</label>
                                <input type="password" name="password" id="password" required class="form-control">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="email">تکرار رمز عبور</label>
                                <input type="password" class="form-control" required name="password_confirmation">
                            </div>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn float-right btn-success btn-icon"><b><i
                                        class="fas fa-arrow-alt-circle-down"></i></b>ثبت اطلاعات
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
