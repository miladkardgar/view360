@extends('admin.layouts.admin_content_layout')
@section('title','لیست ساب دامین ها')

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
                        if (column[0] == 2) {
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
            <h4 class="text-center text-info">لیست ساب دامین ها</h4>
            <button class="btn btn-success" data-toggle="modal" data-target="#modal_AddSubDomain">افزودن ساب دامین
            </button>

            <div class="clearfix"></div>
            <hr>
            <table class="table" id="usersTable">
                <thead>
                <tr>
                    <th>عنوان</th>
                    <th>تعداد زیر مجموعه</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                </tbody>
                <tfoot>
                <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
                </tfoot>
            </table>
        </div>


    </div>


    <div id="modal_AddSubDomain" class="modal fade" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h6 class="modal-title">افزودن ساب دامین</h6>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body text-black-50" id="modal_AddSubDomain_body">
                    <form action="" method="post">
                        <div class="row">
                            <div class="col-12 col-md-12">
                                <div class="form-group">
                                    <label for="">عنوان ساب دامین</label>
                                    <input type="text" class="form-control" name="title">
                                </div>
                            </div>
                            <div class="col-12 col-md-12">
                                <div class="form-group">
                                    <button class="btn btn-primary float-right" disabled>افزودن</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
