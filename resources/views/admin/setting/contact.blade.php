@extends('admin.layouts.admin_content_layout')
@section('title','ارتباط با ما')

@section('meta')
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
                        if (column[0] == 1 || column[0] == 2 ||  column[0] == 5 || column[0] == 6 ) {
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
        });
    </script>
@stop
@section('content')
    <div class="card">
        <div class="card-body text-black-50">
            <table class="table"  id="usersTable">
                <thead>
                <tr>
                    <th>نام و نام خانوادگی</th>
                    <th>ایمیل</th>
                    <th>شماره تلفن</th>
                    <th>موضوع</th>
                    <th>متن</th>
                    <th>شماره فایل</th>
                    <th>خوانده شده</th>
                    <th>نمایش</th>
                </tr>
                </thead>
                <tbody>
                @foreach($contacts as $contact)
                    @php $read = $contact->read_status; @endphp
                    @if($read==1)
                        @php
                            $read="خوانده شده";
                            $color="success"
                        @endphp
                    @else
                        @php
                            $read="خوانده نشده";
                            $color="warning"
                        @endphp
                    @endif
                    <tr>
                        <td>{{$contact->name}}</td>
                        <td>{{$contact->email}}</td>
                        <td>{{$contact->phone}}</td>
                        <td>{{$contact->subject}}</td>
                        <td>{{$contact->message}}</td>
                        <td>{{$contact->file_id}}</td>
                        <td class="bg-{{$color}} text-center">{{$read}}</td>
                        <td><a href="/admin/setting/contact/view/{{$contact->id}}" class="btn btn-info btn-xs"><i
                                    class="icon-eye"></i></a></td>
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
@endsection
