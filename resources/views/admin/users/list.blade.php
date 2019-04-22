@extends('admin.layouts.admin_content_layout')
@section('title','لیست کاربران')
@section('meta')
    <meta name="_token" content="{{csrf_token()}}"/>
@stop
@section('css')
    <link href="{{url('/public/assets/admin/js/plugins/datatable/datatables.css')}}" rel="stylesheet">
    <link
        href="{{url('/public/assets/admin/js/plugins/datatable/DataTables-1.10.18/css/dataTables.bootstrap4.min.css')}}"
        rel="stylesheet">
@stop
@section('js')
    <script src="{{url('/public/assets/admin/js/plugins/datatable/datatables.js')}}" type="text/javascript"></script>
    <script src="{{url('/public/assets/admin/js/plugins/datatable/DataTables-1.10.18/js/dataTables.bootstrap4.min.js')}}"
        type="text/javascript"></script>
    <script src="{{url('/public/assets/admin/js/plugins/datatable/FixedColumns-3.2.5/js/dataTables.fixedColumns.js')}}"
            type="text/javascript"></script>
    <script src="{{url('/public/assets/admin/js/main/bootstrap.min.js')}}" type="text/javascript"></script>
    <script src="{{url('/public/assets/admin/js/plugins/sweet/sweetalert2.all.min.js')}}"
            type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $("body").addClass("sidebar-xs");
            $("#usersTable").DataTable({
                initComplete: function () {
                    this.api().columns().every(function () {
                        var column = this;
                        if (column[0] == 2 || column[0] == 3 || column[0] == 4 ||column[0] == 5 || column[0] == 6  ) {
                            var select = $('<select><option value="">همه</option></select>')
                                .appendTo($(column.footer()).empty())
                                .on('change', function () {
                                    var val = $.fn.dataTable.util.escapeRegex(
                                        $(this).val()
                                    );

                                    column
                                        .search(val ? '^' + val + '$' : '', true, false)
                                        .draw();
                                });
                            column.data().unique().sort().each(function (d, j) {
                                select.append('<option value="' + d + '">' + d + '</option>')
                            });
                        }
                    });
                },
                orderCellsTop: true,
                fixedHeader: true,
            });
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });
            $(document).on("click",".btn_ChangeStatus", function () {
                var id = $(this).data('id');
                var val = $(this).data('value');
                Swal.fire({
                    title: 'تغییر وضعیت',
                    text: "آیا از تغییر وضعیت این کاربر اطمینان دارید؟",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'بله! انحام بده.',
                    cancelButtonText: 'انصراف'
                }).then((result) => {
                    if (result.value) {
                        window.location.href = '/admin/users/list/changeStatus/' + id + '/' + val;
                    }
                });
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
            $(".btn_ChangePassword").on("click", function () {
                var id = $(this).data("id");
                $("#modal_changeRole").modal("show");
                $.ajax({
                    url: "{{url('/admin/users/list/changePassword')}}",
                    method: "post",
                    data: {id: id},
                    success: function (result) {
                        $("#modal_changeRole_body").html(result)
                    }, error: function (error) {
                        console.log("error" + error)
                    }
                })

            })
            $(document).on("click", ".btn_ChangeInfo",function () {
                var id = $(this).data("id");
                $("#modal_changeRole").modal("show");
                $.ajax({
                    url: "{{url('/admin/users/list/changeInfo')}}",
                    method: "post",
                    data: {id: id},
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
            <div id="resFileInfo"></div>

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
                            $color2='success';
                        @endphp
                    @else
                        @php
                            $status = 'active';
                            $icon = "check";
                            $color='success';
                            $color2='danger';
                        @endphp
                    @endif
                    <tr>
                        <td>{{$user->name}}</td>
                        <td>{{$user->family}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{isset($user->roles->title)?$user->roles->title:''}}</td>
                        <td>{{$user->mobile}}</td>
                        <td>{{$user->naCode}}</td>
                        <td class="bg-{{$color2}} text-center">{{$user->status}}</td>
                        <td>
                            <div class="btn-group">
                                <button class="btn btn-xs btn-outline-{{$color}} btn_ChangeStatus"
                                        data-id="{{$user->id}}" data-value="{{$status}}"><i
                                        class="icon-{{$icon}}"></i></button>
                                <button class="btn btn-xs btn-outline-dark btn_ChangeRole" data-id="{{$user->id}}"
                                        data-role="{{isset($user->roles->id)?$user->roles->title:''}}}"><i
                                        class="icon-person"></i></button>
                                <button class="btn btn-xs btn-outline-dark btn_ChangeInfo" data-id="{{$user->id}}">
                                    <i class="icon-database-edit2"></i></button>
                                <button class="btn btn-xs btn-outline-dark btn_ChangePassword" data-id="{{$user->id}}">
                                    <i class="icon-key"></i></button>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                </tfoot>

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
                <div class="modal-body text-black-50" id="modal_changeRole_body">

                </div>
            </div>
        </div>
    </div>
@endsection
