@extends('admin.layouts.admin_layout')
@section('meta')
@stop
@section('css')
@stop
@section('js')
@stop
@section('main_data')
    <!-- Page content -->
    <div class="page-content login-cover">

        <!-- Main content -->
        <div class="content-wrapper">

            <!-- Content area -->
            <div class="content d-flex justify-content-center align-items-center">

                <!-- Login form -->
                <div class="card mb-0">
                    <ul class="nav nav-tabs nav-justified alpha-grey mb-0">
                        <li class="nav-item"><a href="#login-tab1" class="nav-link border-y-0 border-left-0 active"
                                                data-toggle="tab"><h6 class="my-1">ورود</h6></a></li>
                        <li class="nav-item"><a href="#login-tab2" class="nav-link border-y-0 border-right-0"
                                                data-toggle="tab"><h6 class="my-1">ثبت نام</h6></a></li>
                    </ul>

                    <div class="tab-content card-body">
                        <div class="tab-pane fade show active" id="login-tab1">
                            <form class="login-form wmin-sm-400" action="/admin/login/check" method="post">
                                {{csrf_field()}}
                                <div class="text-center mb-3">
                                    <i class="icon-reading icon-2x text-slate-300 border-slate-300 border-3 rounded-round p-3 mb-3 mt-1"></i>
                                    <h5 class="mb-0">ورود به حساب کاربری</h5>
                                    <span class="d-block text-muted">اعتبار سنجی</span>
                                </div>

                                <div class="form-group form-group-feedback form-group-feedback-left">
                                    <input type="text" class="form-control" placeholder="نام کاربری یا شماره موبایل"
                                           name="username">
                                    <div class="form-control-feedback">
                                        <i class="icon-user text-muted"></i>
                                    </div>
                                </div>

                                <div class="form-group form-group-feedback form-group-feedback-left">
                                    <input type="password" class="form-control" placeholder="کلمه عبور" name="password">
                                    <div class="form-control-feedback">
                                        <i class="icon-lock2 text-muted"></i>
                                    </div>
                                </div>

                                <div class="form-group d-flex align-items-center">
                                    <div class="form-check mb-0">
                                        <label class="form-check-label">
                                            <input type="checkbox" name="remember" class="form-input-styled" checked
                                                   data-fouc>
                                            به یاد داشته باش!
                                        </label>
                                    </div>

                                    <a href="/admin/password-recovery" class="ml-auto">کلمه عبور را فراموش کرده
                                        اید؟</a>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-block">ورود</button>
                                </div>


                                <div class="form-group text-center text-muted content-divider">
                                    <span class="px-2">عضو سایت نیستید؟</span>
                                </div>

                                <div class="form-group">
                                    <a href="#" class="btn btn-light btn-block">عضویت در سایت</a>
                                </div>

                                <span class="form-text text-center text-muted">ثبت نام نهایی به منذله مطالعه و پذیرش <a
                                            href="#">قوانین و مقررات </a> میباشد.</span>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="login-tab2">
                            <form class="login-form wmin-sm-400" action="/admin/register/store" method="post">
                                {{csrf_field()}}
                                <div class="text-center mb-3">
                                    <i class="icon-plus3 icon-2x text-success border-success border-3 rounded-round p-3 mb-3 mt-1"></i>
                                    <h5 class="mb-0">ایجاد حساب کاربری</h5>
                                    <span class="d-block text-muted">لطفاً گزینه های زیر را پر کنید.</span>
                                </div>
                                <div class="form-group form-group-feedback form-group-feedback-left">
                                    <input type="text" class="form-control" placeholder="نام" name="name">
                                    <div class="form-control-feedback">
                                        <i class="icon-user-check text-muted"></i>
                                    </div>
                                </div>
                                <div class="form-group form-group-feedback form-group-feedback-left">
                                    <input type="text" class="form-control" placeholder="نام خانوادگی" name="family">
                                    <div class="form-control-feedback">
                                        <i class="icon-users text-muted"></i>
                                    </div>
                                </div>
                                <div class="form-group form-group-feedback form-group-feedback-left">
                                    <input type="password" class="form-control" placeholder="کلمه عبور" name="password">
                                    <div class="form-control-feedback">
                                        <i class="icon-user-lock text-muted"></i>
                                    </div>
                                </div>
                                <div class="form-group form-group-feedback form-group-feedback-left">
                                    <input type="number" class="form-control" placeholder="شماره همراه" name="mobile">
                                    <div class="form-control-feedback">
                                        <i class="icon-mobile text-muted"></i>
                                    </div>
                                </div>
                                <div class="form-group form-group-feedback form-group-feedback-left">
                                    <input type="email" class="form-control" placeholder="ایمیل" name="email">
                                    <div class="form-control-feedback">
                                        <i class="icon-mention text-muted"></i>
                                    </div>
                                </div>
                                <div class="form-group text-center text-muted content-divider">
                                    <span class="px-2">شرایط ثبت نام</span>
                                </div>
                                <div class="form-group">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="checkbox" name="remember" class="form-input-styled" checked
                                                   data-fouc>عضویت در خبرنامه
                                        </label>
                                    </div>

                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="checkbox" name="remember" class="form-input-styled" data-fouc>
                                            پذیرش <a href="#">قوانین و مقررات</a>
                                        </label>
                                    </div>
                                </div>
                                <button type="submit" class="btn bg-dark btn-block">ثبت نام</button>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /login form -->
            </div>
            <!-- /content area -->
        </div>
        <!-- /main content -->
    </div>
    <!-- /page content -->
@endsection