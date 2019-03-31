
<div class="sidebar sidebar-dark sidebar-main sidebar-expand-md">

    <!-- Sidebar mobile toggler -->
    <div class="sidebar-mobile-toggler text-center">
        <a href="#" class="sidebar-mobile-main-toggle">
            <i class="icon-arrow-right8"></i>
        </a>
        Navigation
        <a href="#" class="sidebar-mobile-expand">
            <i class="icon-screen-full"></i>
            <i class="icon-screen-normal"></i>
        </a>
    </div>
    <!-- /sidebar mobile toggler -->


    <!-- Sidebar content -->
    <div class="sidebar-content">

        <!-- User menu -->
        <div class="sidebar-user">
            <div class="card-body">
                <div class="media">
                    <div class="mr-3">
                        <a href="#"><img src="{{url('public/assets/admin/images/placeholders/placeholder.jpg')}}" width="38" height="38" class="rounded-circle" alt=""></a>
                    </div>

                    <div class="media-body">
                        <div class="media-title font-weight-semibold">{{auth()->user()->name}} {{auth()->user()->family}}</div>
                        <div class="font-size-xs opacity-50">
                            <i class="icon-pin font-size-sm"></i> &nbsp;Role
                        </div>
                    </div>

                    <div class="ml-3 align-self-center">
                        <a href="#" class="text-white"><i class="icon-cog3"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- /user menu -->


        <!-- Main navigation -->
        <div class="card card-sidebar-mobile">
            <ul class="nav nav-sidebar" data-nav-type="accordion">

                <!-- Main -->
                <li class="nav-item-header">
                    <div class="text-uppercase font-size-xs line-height-xs">منو</div>
                    <i class="icon-menu" title="Main"></i></li>
                <li class="nav-item">
                    <a href="/admin" class="nav-link active">
                        <i class="icon-home4"></i>
                        <span>داشبورد</span>
                    </a>
                </li>
                <li class="nav-item nav-item-submenu nav-item-expanded {{ Route::is('/admin/estate/*') ? 'nav-item-open' : '' }}">
                    <a href="#" class="nav-link"><i class="icon-copy"></i> <span>مدیریت املاک</span></a>
                    <ul class="nav nav-group-sub" data-submenu-title="Layouts" {{ Route::is('/admin/estate/*') ? '' : 'display="none"' }}>
                        <li class="nav-item"><a href="/admin/estate/add" class="nav-link {{ Route::is('/admin/estate/add') ? 'active' : '' }}">افزودن ملک</a></li>
                        <li class="nav-item"><a href="/admin/estate/list" class="nav-link {{ Route::is('/admin/estate/list') ? 'active' : '' }}">لیست املاک</a></li>
                        <li class="nav-item"><a href="/admin/estate/setting" class="nav-link {{ Route::is('/admin/estate/setting') ? 'active' : '' }}">تنظیمات</a></li>
                    </ul>
                </li>
                <li class="nav-item nav-item-submenu">
                    <a href="#" class="nav-link"><i class="icon-color-sampler"></i> <span>کاربران</span></a>

                    <ul class="nav nav-group-sub" data-submenu-title="Themes">
                        <li class="nav-item"><a href="/admin/users/add" class="nav-link {{ Request::is('/admin/users/add') ? 'active' : '' }}">افزودن کاربر</a></li>
                        <li class="nav-item"><a href="/admin/users/list" class="nav-link {{ Request::is('/admin/users/list') ? 'active' : '' }}">لیست کاربران</a></li>
                        <li class="nav-item"><a href="/admin/users/permissions" class="nav-link {{ Request::is('/admin/users/permissions') ? 'active' : '' }}">دسترسی ها</a></li>
                        <li class="nav-item"><a href="/admin/users/setting" class="nav-link {{ Request::is('/admin/users/setting') ? 'active' : '' }}">تنظیمات</a></li>
                    </ul>
                </li>

                <li class="nav-item nav-item-submenu">
                    <a href="#" class="nav-link"><i class="icon-color-sampler"></i> <span>تنظیمات سایت</span></a>

                    <ul class="nav nav-group-sub" data-submenu-title="Themes">
                        <li class="nav-item"><a href="/admin/setting/about" class="nav-link {{ Request::is('/admin/setting/about') ? 'active' : '' }}">درباره ما</a></li>
                        <li class="nav-item"><a href="/admin/setting/contact" class="nav-link {{ Request::is('/admin/setting/contact') ? 'active' : '' }}">تماس با ما</a></li>
                    </ul>
                </li>
                <!-- /page kits -->

            </ul>
        </div>
        <!-- /main navigation -->

    </div>
    <!-- /sidebar content -->

</div>
