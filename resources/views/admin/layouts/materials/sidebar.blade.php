@php
    $estateAdd = app('estates');
@endphp
<div class="sidebar sidebar-dark sidebar-main sidebar-expand-md">

    <!-- Sidebar mobile toggler -->
    <div class="sidebar-mobile-toggler text-center">
        <a href="#" class="sidebar-mobile-main-toggle">
            <i class="icon-arrow-right8"></i>
        </a>
        منو
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
                        <a href="#"><img src="{{url('public/assets/admin/images/placeholders/placeholder.jpg')}}"
                                         width="38" height="38" class="rounded-circle" alt=""></a>
                    </div>

                    <div class="media-body">
                        <div
                            class="media-title font-weight-semibold">{{auth()->user()->name}} {{auth()->user()->family}}</div>
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
                    <a href="/admin"
                       class="nav-link {{ Request::segment(1) === 'admin' && Request::segment(2) ==null ? 'active' : '' }}">
                        <i class="icon-home4"></i>
                        <span>داشبورد</span>
                    </a>
                </li>
                <li class="nav-item nav-item-submenu {{ Request::segment(2) === 'estate' ? 'nav-item-expanded nav-item-open' : '' }}">
                    <a href="#" class="nav-link"><i class="icon-copy"></i> <span>مدیریت املاک</span></a>

                    <ul class="nav nav-group-sub" data-submenu-title="Estate">
                        <li class="nav-item nav-item-submenu {{ Request::segment(2) === 'estate' && Request::segment(3)==='add'  ? 'nav-item-open' : '' }}">
                            <a href="#" class="nav-link">افزودن ملک</a>
                            <ul class="nav nav-group-sub"
                                style="{{ Request::segment(2) === 'estate' && Request::segment(3)==='add' ? 'display:block' : 'display:none' }}">
                                @foreach($estateAdd as $estate)
                                    <li class="nav-item"><a href="/admin/estate/add/{{$estate->id}}"
                                                            class="nav-link {{ Request::segment(2) === 'estate' && Request::segment(3)==='add' && Request::segment(4)==$estate->id ? 'active' : '' }}">{{$estate->title}}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    </ul>
                    <ul class="nav nav-group-sub"
                        data-submenu-title="Estates" {{ Request::segment(2) === 'estate' ? '' : 'display="none"' }}>
                        <li class="nav-item"><a href="/admin/estate/list"
                                                class="nav-link {{ Request::segment(2) === 'estate' && Request::segment(3)==='list' ? 'active' : '' }}">لیست
                                املاک</a></li>
                        <li class="nav-item"><a href="/admin/estate/setting"
                                                class="nav-link {{ Request::segment(2) === 'estate' && Request::segment(3)==='setting' ? 'active' : '' }}">تنظیمات</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item nav-item-submenu {{ Request::segment(2) === 'users' ? 'nav-item-expanded nav-item-open' : '' }}">
                    <a href="#" class="nav-link"><i class="icon-color-sampler"></i> <span>کاربران</span></a>

                    <ul class="nav nav-group-sub"
                        data-submenu-title="Users" {{ Request::segment(2) === 'users' ? '' : 'display="none"' }}>
                        <li class="nav-item"><a href="/admin/users/add"
                                                class="nav-link {{ Request::segment(2) === 'users' && Request::segment(3)==='add' ? 'active' : '' }}">افزودن
                                کاربر</a></li>
                        <li class="nav-item"><a href="/admin/users/list"
                                                class="nav-link {{ Request::segment(2) === 'users' && Request::segment(3)==='list' ? 'active' : '' }}">لیست
                                کاربران</a></li>
                        <li class="nav-item"><a href="/admin/users/permissions"
                                                class="nav-link {{ Request::segment(2) === 'users' && Request::segment(3)==='permissions' ? 'active' : '' }}">دسترسی
                                ها</a></li>
                        <li class="nav-item"><a href="/admin/users/setting"
                                                class="nav-link {{ Request::segment(2) === 'users' && Request::segment(3)==='setting' ? 'active' : '' }}">تنظیمات</a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item nav-item-submenu {{ Request::segment(2) === 'setting' ? 'nav-item-expanded nav-item-open' : '' }}">
                    <a href="#" class="nav-link"><i class="icon-color-sampler"></i> <span>تنظیمات سایت</span></a>

                    <ul class="nav nav-group-sub"
                        data-submenu-title="setting" {{ Request::segment(2) === 'setting' ? '' : 'display="none"' }}>
                        <li class="nav-item"><a href="/admin/setting/about"
                                                class="nav-link {{ Request::segment(2) === 'setting' && Request::segment(3) === 'about' ? 'active' : '' }}">درباره
                                ما</a></li>
                        <li class="nav-item"><a href="/admin/setting/contact"
                                                class="nav-link {{ Request::segment(2) === 'setting' && Request::segment(3) === 'contact' ? 'active' : '' }}">تماس
                                با ما</a></li>
                    </ul>
                </li>
                <!-- /page kits -->

            </ul>
        </div>
        <!-- /main navigation -->

    </div>
    <!-- /sidebar content -->

</div>
