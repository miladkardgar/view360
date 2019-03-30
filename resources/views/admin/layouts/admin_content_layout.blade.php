@extends('admin.layouts.admin_layout')
@section('main_data')
    @include('admin.layouts.materials.navbar')
    <div class="page-container bg-slate-100">
        <div class="page-content">
            @include('admin.layouts.materials.sidebar')
            <div class="content-wrapper">
                <div class="content">
                    @yield('content')
                </div>
                @include('admin.layouts.materials.admin_footer')
            </div>
        </div>
    </div>
@stop