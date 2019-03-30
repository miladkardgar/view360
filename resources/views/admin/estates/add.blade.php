@extends('admin.layouts.admin_content_layout')
@section('meta')
    <meta name="_token" content="{{csrf_token()}}" />
@stop
@section('css')
@stop
@section('js')
    <script>
        $(document).on("change", '#typeFile', function () {
            var id = $(this).val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{url('/admin/estates/ajax/getInfo')}}",
                data: {id: id},
                method: "POST",
                success: function (result) {
                    $("#resFileInfo").html(result);
                },
                error() {
                    console.log("error");
                }
            })
        });
    </script>
@stop
@section('content')
    <div class="container-fluid text-black-50">
        <div class="card">
            <div class="card-body">
                <form action="" method="post">
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <label for="type">نوع فایل</label>
                                <select name="typeFile" id="typeFile" class="form-control">
                                    <option value="">انتخاب نمایید.</option>
                                    @foreach($datas as $data)
                                        <option value="{{$data->id}}">{{$data->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-12" id="resFileInfo">

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
