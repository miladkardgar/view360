@extends('admin.layouts.admin_content_layout')
@section('title','لیست کاربران')

@section('meta')
    <meta name="_token" content="{{csrf_token()}}"/>
@stop
@section('css')
    <link href="{{url('/public/assets/admin/js/plugins/datatable/datatables.css')}}" rel="stylesheet">
@stop
@section('js')
    <script src="{{url('/public/assets/admin/js/plugins/datatable/datatables.js')}}" type="text/javascript"></script>
    <script src="{{url('/public/assets/admin/js/main/bootstrap.min.js')}}" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $("#usersTable").DataTable();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });
            $(".btn_ChangeStatus").on("click", function () {
                var id = $(this).data("id");
                var val = $(this).data("value");
                $.ajax({
                    url: "{{url('/admin/users/list/changeStatus')}}",
                    method: "post",
                    data: {id: id, val: val},
                    success: function (result) {
                        var res = JSON.parse(result);
                        if (res.result === "success") {
                            window.location.href = "";
                        }
                    }, error: function (error) {
                        console.log("error" + error)
                    }
                })
            });
            $(".btn_ChangeRole").on("click", function () {
                var id = $(this).data("id");
                var role = $(this).data("role");
                $("#modal_changeRole").modal("show");
                $.ajax({
                    url: "{{url('/admin/users/list/changeRole')}}",
                    method: "post",
                    data: {id: id, role: role},
                    success: function (result) {
                        $("#modal_changeRole_body").html(result)
                    }, error: function (error) {
                        console.log("error" + error)
                    }
                })

            })

        });


    </script>
@stop
@section('content')
    <div id="resFileInfo"></div>
    <div class="card">
        <div class="card-body text-black-50">
            <h4>لیست کاربران</h4>
            <table class="table" id="usersTable">
                <thead>
                <tr>
                    <th>نام</th>
                    <th>نام خانوادگی</th>
                    <th>ایمیل</th>
                    <th>نقش</th>
                    <th>شماره همراه</th>
                    <th>کد ملی</th>
                    <th>وضعیت</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>

                @foreach($usersList as $user)
                    @if($user->status=="active")
                        @php
                            $status = 'inactive';
                            $icon = "x";
                            $color='danger';
                        @endphp
                    @else
                        @php
                            $status = 'active';
                            $icon = "check";
                            $color='success';
                        @endphp
                    @endif
                    <tr>
                        <td>{{$user->name}}</td>
                        <td>{{$user->family}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{isset($user->roles->title)?$user->roles->title:''}}</td>
                        <td>{{$user->mobile}}</td>
                        <td>{{$user->naCode}}</td>
                        <td>{{$user->status}}</td>
                        <td>
                            <button class="btn btn-xs btn-outline-@php echo $color; @endphp btn_ChangeStatus"
                                    data-id="{{$user->id}}" data-value="@php echo $status; @endphp"><i
                                    class="icon-@php echo $icon @endphp"></i></button>
                            <button class="btn btn-xs btn-outline-dark btn_ChangeRole" data-id="{{$user->id}}"
                                    data-role="{{isset($user->roles->id)?$user->roles->title:''}}}"><i class="icon-person"></i></button>
                        </td>
                    </tr>
                @endforeach
                </tbody>

            </table>
        </div>
    </div>



    <div id="modal_changeRole" class="modal fade" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h6 class="modal-title">تغییر نقش کاربر</h6>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body text-black-50">
                    <form action="/admin/users/list/changeRole/update" method="post">

                        {{csrf_field()}}
                        <div id="modal_changeRole_body"></div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-link" data-dismiss="modal">انصراف</button>
                            <button type="submit" class="btn bg-primary">ذخیره تغییرات</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
