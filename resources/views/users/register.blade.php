@extends('users.layouts.master')
@section('script')
    @if($errors->any())
        <script>
            Swal.fire({
                type: 'error',
                title: 'خطا!',
                text: '{{$errors->first()}}',
                footer: '<a href>کلمه عبور را فراموش کرده اید؟</a>'
            })
        </script>
    @endif
@endsection
@section('body')
    <main id="ts-main" class="rtl">

        <!--BREADCRUMB
            =========================================================================================================-->
        <section id="breadcrumb">
            <div class="container">
                <nav aria-label="breadcrumb">
                    {{--<ol class="breadcrumb">--}}
                        {{--<li class="breadcrumb-item"><a href="#">Home</a></li>--}}
                        {{--<li class="breadcrumb-item"><a href="#">Library</a></li>--}}
                        {{--<li class="breadcrumb-item active" aria-current="page">Data</li>--}}
                    {{--</ol>--}}
                </nav>
            </div>
        </section>

        <!--PAGE TITLE
            =========================================================================================================-->
        <section id="page-title">
            <div class="container">
                <div class="ts-title">
                    <h1>ثبت نام</h1>
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

                            <!--Register tab-->
                            <li class="nav-item">
                                <a class="nav-link active" id="register-tab" data-toggle="tab" href="#register" role="tab" aria-controls="register" aria-selected="false">
                                    <h3>ثبت نام</h3>
                                </a>
                            </li>

                        </ul>

                        <!--TAB CONTENT
                            =========================================================================================-->
                        <div class="tab-content">

                            <div class="tab-pane active" id="register" role="tabpanel" aria-labelledby="register-tab">
                                <form class="ts-form" id="form-register" method="post" action="register">
                                    {{csrf_field()}}
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="register-name" name="name"
                                               placeholder="نام" required>
                                    </div>

                                    <div class="form-group">
                                        <input type="text" class="form-control" id="register-family" name="family"
                                               placeholder="نام خانوادگی" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="email" class="form-control" id="register-email" placeholder="ایمیل"
                                               required name="email">
                                    </div>
                                    <div class="form-group">
                                        <input type="number" class="form-control" id="register-email"
                                               placeholder="موبایل"
                                               required name="mobile">
                                    </div>

                                    <!--Password-->
                                    <div class="input-group ts-has-password-toggle">
                                        <input type="password" class="form-control border-right-0"
                                               placeholder="کلمه عبور" required name="password">
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

                                @include('users.errors')

                                <!--Submit button-->
                                    <button type="submit" class="btn btn-primary float-left">ثبت نام</button>


                                </form>
                            </div>
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
