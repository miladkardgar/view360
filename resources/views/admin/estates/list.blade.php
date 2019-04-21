@extends('admin.layouts.admin_content_layout')
@section('title','لیست فایل ها')

@section('meta')
    <meta name="_token" content="{{csrf_token()}}"/>
@stop
@section('css')
    <link href="{{url('/public/assets/admin/js/plugins/datatable/datatables.css')}}" rel="stylesheet">
    <link href="{{url('/public/assets/admin/js/plugins/datatable/DataTables-1.10.18/css/dataTables.bootstrap4.min.css')}}"
          rel="stylesheet">
@stop
@section('js')
    <script src="{{url('/public/assets/admin/js/plugins/datatable/datatables.js')}}" type="text/javascript"></script>
    <script src="{{url('/public/assets/admin/js/plugins/datatable/DataTables-1.10.18/js/dataTables.bootstrap4.min.js')}}"
            type="text/javascript"></script>
    <script src="{{url('/public/assets/admin/js/plugins/datatable/FixedColumns-3.2.5/js/dataTables.fixedColumns.js')}}"
            type="text/javascript"></script>
    <script src="{{url('/public/assets/admin/js/main/bootstrap.min.js')}}" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $("#usersTable").DataTable({
                initComplete: function () {
                    this.api().columns().every(function () {
                        var column = this;
                        if (column[0] === 2 || column[0] === 3 || column[0] === 5 || column[0] === 6) {
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
                    <th>نام فایل</th>
                    <th>نوع فایل</th>
                    <th>نوع معامله</th>
                    <th>مساحت</th>
                    <th>منطقه</th>
                    <th>مالک</th>
                    <th>تلفن مالک</th>
                    <th>وضعیت</th>
                    <th></th>
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
                        <td>{{$fileList->title}}</td>
                        <td>{{$fileList->data->title}}</td>
                        <td>{{$fileList->transactionType->title}}</td>
                        <td>{{$fileList->area}}</td>
                        <td>{{$fileList->getRegion->name}}</td>
                        <td>{{$fileList->ownerName}}</td>
                        <td>{{$fileList->ownerPhone}}</td>
                        <td><span class="badge badge-{{$color2}}">@php echo $status @endphp</span></td>
                        <td>
                            <a class="btn btn-xs btn-outline-@php echo $color; @endphp btn_ChangeStatus"
                               data-id="{{$fileList->id}}" data-value="@php echo $status; @endphp"
                               href="/admin/estate/changeStatus/{{$fileList->id}}/{{$val}}">
                                <i class="icon-@php echo $icon @endphp"></i></a>
                            <a href="/admin/estate/edit/{{$fileList->data_id}}/{{$fileList->id}}/"
                               class="btn btn-xs btn-outline-dark btn_ChangeRole"><i
                                        class="icon-database-edit2"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th> </th>
                    <th> </th>
                    <th> </th>
                    <th> </th>
                    <th> </th>
                    <th> </th>
                    <th> </th>
                    <th> </th>
                    <th> </th>
                    <th> </th>
                    <th> </th>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>
@endsection
