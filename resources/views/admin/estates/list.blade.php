@extends('admin.layouts.admin_content_layout')
@section('title','لیست فایل ها')

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
    <script
            src="{{url('/public/assets/admin/js/plugins/datatable/DataTables-1.10.18/js/dataTables.bootstrap4.min.js')}}"
            type="text/javascript"></script>
    <script src="{{url('/public/assets/admin/js/plugins/datatable/FixedColumns-3.2.5/js/dataTables.fixedColumns.js')}}"
            type="text/javascript"></script>
    <script src="{{url('/public/assets/admin/js/plugins/sweet/sweetalert2.all.min.js')}}"
            type="text/javascript"></script>
    <script src="{{url('/public/assets/admin/js/main/bootstrap.min.js')}}" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $("body").addClass("sidebar-xs");
            $("#usersTable").DataTable({
                initComplete: function () {
                    this.api().columns().every(function () {
                        var column = this;
                        if (column[0] == 2 || column[0] == 3 || column[0] == 4 || column[0] == 5 || column[0] == 6 || column[0] == 8) {
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
                "order": [[ 0, "desc" ]],
            });
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });
            $(".btn_ChangeStatus").on("click", function () {
                var id = $(this).data("id");
                var val = $(this).data("value");
                $.ajax({
                    url: "{{url('/admin/estates/list')}}",
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
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        $(document).on('click','.btn_delete', function () {
            var id = $(this).data('id');
            Swal.fire({
                title: 'حذف',
                text: "آیا از حذف این فایل اطمینان دارید؟",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'بله! انحام بده.',
                cancelButtonText: 'انصراف'
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        url: "{{route('removeEstate')}}",
                        method: "POST",
                        data: {id: id},
                        success: function (result) {
                            return window.location.reload();
                        }, error: function (error) {
                            console.log("error" + error)
                        }
                    })
                }
            })
        })
        $(document).on('click', ".btn_ChangeStatus", function () {
            var id = $(this).data('id');
            var val = $(this).data('value');
            Swal.fire({
                title: 'تغییر وضعیت',
                text: "آیا از تغییر وضعیت این فایل اطمینان دارید؟",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'بله! انحام بده.',
                cancelButtonText: 'انصراف'
            }).then((result) => {
                if (result.value) {
                    window.location.href = '/admin/estate/list/changeStatus/' + id + '/' + val;
                }
            })
        })
    </script>
@stop
@section('content')
    <div id="resFileInfo"></div>
    <div class="card">
        <div class="card-body text-black-50">
            <h4 class="text-center text-info">لیست فایل ها</h4>
            <div class="clearfix"></div>
            <hr>
            <table class="table" id="usersTable">
                <thead>
                <tr>
                    <th>شماره فایل</th>
                    <th>نوع فایل</th>
                    <th>نوع معامله</th>
                    <th>مساحت</th>
                    <th>شهر</th>
                    <th>منطقه</th>
                    <th>مالک</th>
                    <th>تلفن مالک</th>
                    <th>وضعیت</th>
                    <th>فعالیت</th>
                </tr>
                </thead>
                <tbody>

                @foreach($filesList as $fileList)
                    @if($fileList->status=="active")
                        @php
                            $status = 'active';
                            $icon = "x";
                            $color='danger';
                            $color2='success';
                        $val = "inactive";
                        @endphp
                    @else
                        @php
                            $status = 'inactive';
                            $icon = "check";
                            $color='success';
                            $color2='danger';
                            $val = "active"
                        @endphp
                    @endif
                    <tr>
                        <td>{{$fileList->id}}</td>
                        <td>{{$fileList->data->title}}</td>
                        <td>{{$fileList->transactionType ? $fileList->transactionType->title:''}}</td>
                        <td>{{$fileList->area}}</td>
                        <td>{{$fileList->getCity ? $fileList->getCity->name:''}}</td>
                        <td>{{$fileList->getRegion ? $fileList->getRegion->name:''}}</td>
                        <td>{{$fileList->ownerName ? $fileList->ownerName:''}}</td>
                        <td>{{$fileList->ownerPhone ? $fileList->ownerPhone:''}}</td>
                        <td class="bg-{{$color2}} text-center">{{$status}}</td>
                        <td>
                            <div class="btn-group">
                                <a class="btn btn-sm btn-danger btn_delete"
                                   data-id="{{$fileList->id}}" data-value="{{$val}}"
                                   href="javascript:;">
                                    <i class="icon-trash"></i></a>
                                <a class="btn btn-sm btn-outline-{{$color}} btn_ChangeStatus"
                                   data-id="{{$fileList->id}}" data-value="{{$val}}"
                                   href="javascript:;">
                                    <i class="icon-{{$icon}}"></i></a>
                                <a href="/admin/estate/edit/{{$fileList->data_id}}/{{$fileList->id}}/"
                                   class="btn btn-sm btn-outline-dark btn_ChangeRole"><i
                                            class="icon-database-edit2"></i></a>
                                <a href="/{{$fileList->data_id}}/{{$fileList->id}}"
                                   class="btn btn-sm btn-outline-dark " target="_blank"><i
                                            class="icon-eye"></i></a>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>
@endsection
