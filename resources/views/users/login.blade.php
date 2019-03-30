@extends('users.layouts.master')
@section('body')
    <main id="ts-main" class="rtl">

        <!--BREADCRUMB
            =========================================================================================================-->
        <section id="breadcrumb">
            <div class="container">
                <nav aria-label="breadcrumb">
                    {{--<ol class="breadcrumb">--}}
                        {{--<li class="breadcrumb-item"><a href="#">صفحه اصلی</a></li>--}}
                        {{--<li class="breadcrumb-item"><a href="#">کتابخانه</a></li>--}}
                        {{--<li class="breadcrumb-item active" aria-current="page">اطلاعات</li>--}}
                    {{--</ol>--}}
                </nav>
            </div>
        </section>

        <!--PAGE TITLE
            =========================================================================================================-->
        <section id="page-title">
            <div class="container">
                <div class="ts-title">
                    <h1>ورود</h1>
                </div>
            </div>
        </section>

        <!--LOGIN / REGISTER SECTION
            =========================================================================================================-->
        <section id="login-register">
            <div class="container">
                <div class="row">

                    <div class="offset-md-2 col-md-8 offset-lg-3 col-lg-6">

                        <!--LOGIN / REGISTER TABS
                            =========================================================================================-->
                        <ul class="nav nav-tabs" id="login-register-tabs" role="tablist">

                            <!--Login tab-->
                            <li class="nav-item">
                                <a class="nav-link active" id="login-tab" data-toggle="tab" href="#login" role="tab"
                                   aria-controls="login" aria-selected="true">
                                    <h3>ورود</h3>
                                </a>
                            </li>

                            <!--Register tab-->
                            <li class="nav-item">
                                <a class="nav-link" id="register-tab" data-toggle="tab" href="#register" role="tab"
                                   aria-controls="register" aria-selected="false">
                                    <h3>ثبت نام</h3>
                                </a>
                            </li>

                        </ul>

                        <!--TAB CONTENT
                            =========================================================================================-->
                        <div class="tab-content">

                            <!--LOGIN TAB
                                =====================================================================================-->
                            <div class="tab-pane active" id="login" role="tabpanel" aria-labelledby="login-tab">

                                <!--Login form-->
                                <form class="ts-form" id="form-login">

                                    <!--Email-->
                                    <div class="form-group">
                                        <input type="email" class="form-control" id="login-email" placeholder="نام کاربری"
                                               required>
                                    </div>

                                    <!--Password-->
                                    <div class="input-group ts-has-password-toggle">
                                        <input type="password" class="form-control border-right-0"
                                               placeholder="کلمه عبور" value="Sercet_123" required>
                                        <div class="input-group-append">
                                            <a href="#"
                                               class="input-group-text bg-white border-left-0 ts-password-toggle">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                        </div>
                                    </div>

                                    <!--Checkbox and Submit button-->
                                    <div class="ts-center__vertical justify-content-between rtl">

                                        <!--Remember checkbox-->
                                        <div class="custom-control custom-checkbox mb-0">
                                            <input type="checkbox" class="custom-control-input" id="login-check">
                                            <label class="custom-control-label" for="login-check">به یاد داشته باش</label>
                                        </div>

                                        <!--Submit button-->
                                        <button type="submit" class="btn btn-primary">ورود</button>

                                    </div>

                                    <hr>

                                    <!--Forgot password link-->
                                    <a href="#" class="ts-text-small">
                                        <i class="fa fa-sync-alt ts-text-color-primary mr-2"></i>
                                        <span class="ts-text-color-light">کلمه عبور را فراموش کرده اید؟</span>
                                    </a>

                                </form>

                            </div>
                            <!--end #login.tab-pane-->

                            <!--REGISTER TAB
                                =====================================================================================-->
                            <div class="tab-pane" id="register" role="tabpanel" aria-labelledby="register-tab">

                                <!--Register tab-->
                                <form class="ts-form" id="form-register">

                                    <!--Name-->
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="register-name"
                                               placeholder="نام کاربری" required>
                                    </div>

                                    <!--Email-->
                                    <div class="form-group">
                                        <input type="email" class="form-control" id="register-email" placeholder="ایمیل"
                                               required>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="register-email" placeholder="موبایل"
                                               required>
                                    </div>

                                    <!--Password-->
                                    <div class="input-group ts-has-password-toggle">
                                        <input type="password" class="form-control border-right-0"
                                               placeholder="کلمه عبور" required>
                                        <div class="input-group-append">
                                            <a href="#"
                                               class="input-group-text bg-white border-left-0 ts-password-toggle">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                        </div>
                                    </div>

                                    <!--Repeat Password-->
                                    <div class="input-group ts-has-password-toggle">
                                        <input type="password" class="form-control border-right-0"
                                               placeholder="تکرار کلمه عبور" required>
                                        <div class="input-group-append">
                                            <a href="#"
                                               class="input-group-text bg-white border-left-0 ts-password-toggle">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                        </div>
                                    </div>

                                    <!--Checkbox-->
                                    <div class="custom-control custom-checkbox mb-4">
                                        <input type="checkbox" class="custom-control-input" id="register-check"
                                               required>
                                        <label class="custom-control-label" for="register-check">پذیرش <a
                                                    href="#" class="btn-link">قوانین و مقررات سایت</a></label>
                                    </div>

                                    <!--Submit button-->
                                    <button type="submit" class="btn btn-primary">ثبت نام</button>

                                </form>

                            </div>
                            <!--end #register.tab-pane-->
                        </div>
                        <!--end tab-content-->

                    </div>
                    <!--end offset-4.col-md-4-->

                </div>
                <!--end row-->
            </div>
            <!--end container-->
        </section>

    </main>
@endsection