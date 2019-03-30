@extends('admin.layouts.admin_content_layout')
@section('meta')
@stop
@section('css')
@stop
@section('js')
@stop
@section('content')
    <section class="text-black-50">
        <form action="" method="post" id="frm_addUser">
            <div class="row">
                <div class="col-3">
                    <div class="form-group">
                        <label for="name">نام</label>
                        <input type="text" name="name" id="name" class="form-control">
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="family">نام خانوادگی</label>
                        <input type="text" name="family" id="family" class="form-control">
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="meCode">شماره ملی</label>
                        <input type="text" name="meCode" id="meCode" class="form-control">
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="email">ایمیل</label>
                        <input type="text" name="email" id="email" class="form-control">
                    </div>
                </div>

                <div class="col-3">
                    <div class="form-group">
                        <label for="email">شماره همراه</label>
                        <input type="text" name="mobile" id="mobile" class="form-control">
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="email">رمز عبور</label>
                        <input type="text" name="password" id="password" class="form-control">
                    </div>
                </div>
                <div class="col-12">
                    <button class="btn float-right btn-success btn-icon"><b><i class="fas fa-arrow-alt-circle-down"></i></b>ثبت اطلاعات</button>
                </div>
            </div>
        </form>
    </section>
@endsection