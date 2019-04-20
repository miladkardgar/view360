<!-- Main navbar -->
<div class="navbar navbar-expand-md navbar-dark">
    <div class="navbar-brand">
        <a href="/admin" class="d-inline-block">
            <img src="{{url('public/assets/img/logo.png')}}" alt="">
        </a>
    </div>

    <div class="d-md-none">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-mobile">
            <i class="icon-tree5"></i>
        </button>
        <button class="navbar-toggler sidebar-mobile-main-toggle" type="button">
            <i class="icon-paragraph-justify3"></i>
        </button>
    </div>

    <div class="collapse navbar-collapse" id="navbar-mobile">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a href="#" class="navbar-nav-link sidebar-control sidebar-main-toggle d-none d-md-block">
                    <i class="icon-paragraph-justify3"></i>
                </a>
            </li>
        </ul>

        <span class="navbar-text ml-md-3 mr-md-auto">
				<span class="badge bg-success">Online</span>
			</span>

        <ul class="navbar-nav">
{{--            <li class="nav-item dropdown">--}}
{{--                <a href="#" class="navbar-nav-link dropdown-toggle caret-0" data-toggle="dropdown">--}}
{{--                    <i class="icon-people"></i>--}}
{{--                    <span class="d-md-none ml-2">ملک جدید</span>--}}
{{--                </a>--}}

{{--                <div class="dropdown-menu dropdown-menu-right dropdown-content wmin-md-300">--}}
{{--                    <div class="dropdown-content-header">--}}
{{--                        <span class="font-weight-semibold">وضعیت ملک های ثبت شده</span>--}}
{{--                        <a href="#" class="text-default"><i class="icon-search4 font-size-base"></i></a>--}}
{{--                    </div>--}}

{{--                    <div class="dropdown-content-body dropdown-scrollable">--}}
{{--                        <ul class="media-list">--}}
{{--                            <li class="media">--}}
{{--                                <div class="mr-3">--}}
{{--                                    <img src="{{asset('assets/admin/images/placeholders/placeholder.jpg')}}" width="36"--}}
{{--                                         height="36" class="rounded-circle" alt="">--}}
{{--                                </div>--}}
{{--                                <div class="media-body">--}}
{{--                                    <a href="#" class="media-title font-weight-semibold">Jordana Ansley</a>--}}
{{--                                    <span class="d-block text-muted font-size-sm">Lead web developer</span>--}}
{{--                                </div>--}}
{{--                                <div class="ml-3 align-self-center"><span--}}
{{--                                            class="badge badge-mark border-success"></span></div>--}}
{{--                            </li>--}}

{{--                            <li class="media">--}}
{{--                                <div class="mr-3">--}}
{{--                                    <img src="{{asset('assets/admin/images/placeholders/placeholder.jpg')}}" width="36"--}}
{{--                                         height="36" class="rounded-circle" alt="">--}}
{{--                                </div>--}}
{{--                                <div class="media-body">--}}
{{--                                    <a href="#" class="media-title font-weight-semibold">Will Brason</a>--}}
{{--                                    <span class="d-block text-muted font-size-sm">Marketing manager</span>--}}
{{--                                </div>--}}
{{--                                <div class="ml-3 align-self-center"><span class="badge badge-mark border-danger"></span>--}}
{{--                                </div>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}

{{--                    <div class="dropdown-content-footer bg-light">--}}
{{--                        <a href="#" class="text-grey mr-auto">All users</a>--}}
{{--                        <a href="#" class="text-grey"><i class="icon-gear"></i></a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </li>--}}

            <li class="nav-item dropdown">
{{--                <a href="#" class="navbar-nav-link dropdown-toggle caret-0" data-toggle="dropdown">--}}
{{--                    <i class="icon-bubbles4"></i>--}}
{{--                    <span class="d-md-none ml-2">دیدگاه ها</span>--}}
{{--                    <span class="badge badge-pill bg-warning-400 ml-auto ml-md-0">2</span>--}}
{{--                </a>--}}

{{--                <div class="dropdown-menu dropdown-menu-right dropdown-content wmin-md-350">--}}
{{--                    <div class="dropdown-content-header">--}}
{{--                        <span class="font-weight-semibold">آخرین دیدگاها</span>--}}
{{--                        <a href="#" class="text-default"><i class="icon-compose"></i></a>--}}
{{--                    </div>--}}

{{--                    <div class="dropdown-content-body dropdown-scrollable">--}}
{{--                        <ul class="media-list">--}}
{{--                            <li class="media">--}}
{{--                                <div class="mr-3 position-relative">--}}
{{--                                    <img src="{{asset('assets/admin/images/placeholders/placeholder.jpg')}}" width="36"--}}
{{--                                         height="36" class="rounded-circle" alt="">--}}
{{--                                </div>--}}
{{--                                <div class="media-body">--}}
{{--                                    <div class="media-title">--}}
{{--                                        <a href="#">--}}
{{--                                            <span class="font-weight-semibold">James Alexander</span>--}}
{{--                                            <span class="text-muted float-right font-size-sm">04:58</span>--}}
{{--                                        </a>--}}
{{--                                    </div>--}}

{{--                                    <span class="text-muted">who knows, maybe that would be the best thing for me...</span>--}}
{{--                                </div>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}

{{--                    <div class="dropdown-content-footer justify-content-center p-0">--}}
{{--                        <a href="#" class="bg-light text-grey w-100 py-2" data-popup="tooltip" title="Load more"><i--}}
{{--                                    class="icon-menu7 d-block top-0"></i></a>--}}
{{--                    </div>--}}
{{--                </div>--}}
            </li>

            <li class="nav-item dropdown dropdown-user">
                <a href="#" class="navbar-nav-link dropdown-toggle" data-toggle="dropdown">
                    <img src="{{url('public/assets/admin/images/placeholders/placeholder.jpg')}}" class="rounded-circle"
                         alt="">
                    <span>{{auth()->user()->name}} {{auth()->user()->family}}</span>
                </a>

                <div class="dropdown-menu dropdown-menu-right">
{{--                    <a href="#" class="dropdown-item"><i class="icon-user-plus"></i> پروفایل من</a>--}}
{{--                    <a href="#" class="dropdown-item"><i class="icon-coins"></i> املاک من</a>--}}
{{--                    <a href="#" class="dropdown-item"><i class="icon-comment-discussion"></i> پیام ها <span--}}
{{--                                class="badge badge-pill bg-blue ml-auto">58</span></a>--}}
{{--                    <div class="dropdown-divider"></div>--}}
{{--                    <a href="#" class="dropdown-item"><i class="icon-cog5"></i> تنظیمات حساب</a>--}}
                    <a href="/admin/logout/" class="dropdown-item"><i class="icon-switch2"></i> خروج</a>
                </div>
            </li>
        </ul>
    </div>
</div>
