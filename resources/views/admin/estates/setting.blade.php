@extends('admin.layouts.admin_content_layout')
@section('title','تنظیمات فایل ها')

@section('meta')
    <meta name="_token" content="{{csrf_token()}}"/>
@stop
@section('css')
    <link href="{{url('/public/assets/webfonts/fontawsome/css/all.css')}}" rel="stylesheet" type="text/css">
    <style>
        svg {
            width: 25px;
            height: 25px;
        }

        ul, #myUL {
            list-style-type: none;
        }

        /* Remove margins and padding from the parent ul */
        #myUL {
            margin: 0;
            padding: 0;
        }

        /* Style the caret/arrow */
        .caret {
            cursor: pointer;
            user-select: none; /* Prevent text selection */
        }

        /* Create the caret/arrow with a unicode, and style it */
        .caret::before {
            content: "\25C4";
            color: black;
            display: inline-block;
            margin-right: 6px;
        }

        /* Rotate the caret/arrow icon when clicked on (using JavaScript) */
        .caret-down::before {
            transform: rotate(90deg);
        }

        /* Hide the nested list */
        .nested {
            display: none;
        }

        /* Show the nested list when the user clicks on the caret/arrow (with JavaScript) */
        .active {
            display: block;
        }
    </style>
@stop
@section('js')

    <script src="{{url('/public/assets/admin/js/plugins/sweet/sweetalert2.all.min.js')}}"
            type="text/javascript"></script>
    <script>
        function iconSel(name) {
            $("#modal_full").modal('hide');
            var icon = $("#iconShow");
            $("#icon").val(name);
            icon.addClass(name + " fa-3x");
        }

        $(document).ready(function () {

            var toggler = document.getElementsByClassName("caret");
            var i;

            for (i = 0; i < toggler.length; i++) {
                toggler[i].addEventListener("click", function() {
                    this.parentElement.querySelector(".nested").classList.toggle("active");
                    this.classList.toggle("caret-down");
                });
            }
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });
            $(document).on('click', '.changeStatus', function () {
                var id = $(this).data('id');
                var value = $(this).data('value');
                Swal.fire({
                    title: 'تغییر وضعیت',
                    text: "آیا از تغییر وضعیت این شهر اطمینان دارید؟",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'بله! انحام بده.',
                    cancelButtonText: 'انصراف'
                }).then((result) => {
                    if (result.value) {
                        window.location.href = '/admin/estate/setting/city/changeStatus/' + id + '/' + value;
                    }
                })
            })

            $(document).on('click', '.addCity', function () {
                var id = $(this).data("id");
                $("#modal_changeRole").modal("show");
                $.ajax({
                    url: "{{url('/admin/estate/setting/city/addCity')}}",
                    method: "post",
                    data: {id: id},
                    success: function (result) {
                        $("#modal_changeRole_body").html(result)
                    }, error: function (error) {
                        console.log("error" + error)
                    }
                })
            })

            $(document).on('click', '.addRegion', function () {
                var id = $(this).data('id');
                $("#modal_changeRole").modal("show");
                $.ajax({
                    url: "{{url('/admin/estate/setting/city/addCity')}}",
                    method: "post",
                    data: {id: id},
                    success: function (result) {
                        $("#modal_changeRole_body").html(result)
                    }, error: function (error) {
                        console.log("error" + error)
                    }
                })
            })
        })
    </script>
@stop
@section('content')
    <div class="container-fluid text-black-50">
        <div class="card">
            <div class="card-body text-black-50">
                <ul class="nav nav-tabs nav-tabs-highlight nav-justified">
                    <li class="nav-item">
                        <a href="#cityPanel" class="nav-link active" data-toggle="tab">استانها و شهرها</a>
                    </li>
                    <li class="nav-item">
                        <a href="#attrsList" class="nav-link" data-toggle="tab">ویژگی ها</a>
                    </li>
                    <li class="nav-item">
                        <a href="#filesSetting" class="nav-link" data-toggle="tab">فایل ها</a>
                    </li>
                </ul>
                <div class="tab-content text-black-50">
                    <div class="tab-pane fade show active" id="cityPanel">
                        <div class="row justify-content-center ">

                        </div>
                        <ul id="myUL">
                            @foreach($provinces as $province)
                                @php $status3 = "active"; $color3 = "success"; $icon3 = "check"; @endphp
                                @if($province->status=="active")
                                    @php $status3 = "inactive"; $color3 = "danger";$icon3 = "x"; @endphp
                                @endif
                                @if($province->parent==0)
                                    <li>
                                        <span class="caret">
                                            <button class="btn changeStatus" data-value="{{$status3}}" data-id="{{$province->id}}">
                                                <i class="icon-{{$icon3}} text-{{$color3}}"></i>
                                            </button>
                                            <button class="btn addCity" data-id="{{$province->id}}">
                                                <i class="icon-plus2 text-success"></i>
                                            </button>
                                            {{$province->name}}
                                        </span>
                                        <ul class="nested">
                                        @foreach($provinces as $item)
                                            @if($item->parent == $province->id)
                                                @php $status = "active"; $color = "success"; $icon = "check"; @endphp
                                                @if($item->status=="active")
                                                    @php $status = "inactive"; $color = "danger";$icon = "x"; @endphp
                                                @endif

                                                    <li>
                                                        <span class="caret">
                                                            <button class="btn changeStatus" data-value="{{$status}}" data-id="{{$item->id}}">
                                                                <i class="icon-{{$icon}} text-{{$color}}"></i>
                                                            </button>
                                                            <button class="btn addRegion" data-id="{{$item->id}}">
                                                                <i class="icon-plus2 text-success"></i>
                                                            </button>
                                                            {{$item->name}}
                                                        </span>
                                                        <ul class="nested">
                                                        @foreach($provinces as $value)
                                                            @if($value->parent == $item->id)
                                                                @php $status2 = "active"; $color2 = "success"; $icon2 = "check"; @endphp
                                                                @if($value->status=="active")
                                                                    @php $status2 = "inactive"; $color2 = "danger";$icon2 = "x"; @endphp
                                                                @endif
                                                                    <li>
                                                                        <button class="btn changeStatus"
                                                                                data-value="{{$status2}}"
                                                                                data-id="{{$value->id}}"><i
                                                                                class="icon-{{$icon2}} text-{{$color2}}"></i>
                                                                        </button> {{$value->name}}
                                                                    </li>
                                                            @endif
                                                        @endforeach
                                                        </ul>
                                                    </li>
                                            @endif
                                        @endforeach
                                        </ul>
                                    </li>
                                @endif

                            @endforeach
                        </ul>
                    </div>
                    <div class="tab-pane fade" id="attrsList">
                        <form action="/admin/estate/setting/storeAttr" method="post">
                            {{csrf_field()}}
                            <div class="row">
                                <div class="col-4">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="title">عنوان ویژگی</label>
                                                <input type="text" name="title" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="type">ویژگی برای</label>
                                                <select name="type" id="type" class="form-control" required>
                                                    <option value="">انتخاب نمایید.</option>
                                                    <option value="possibilitiesVila">ویلا</option>
                                                    <option value="possibilities">آپراتمان</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12 text-black-50">
                                            <button type="button" class="btn btn-outline-info" data-toggle="modal"
                                                    data-target="#modal_full"><i class="icon-arrow-left12 mr-2"></i>
                                                انتخاب ایکون
                                            </button>
                                            <i id="iconShow" class="float-right"></i>
                                            <input type="hidden" name="file" id="icon" value="">
                                        </div>
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-block btn-primary mt-2">افزودن</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-8">
                                    <div class="row">
                                        <div class="col-6">
                                            @if(sizeof($Attrs[0])>=1)
                                                <h4>ویژگی های ویلا</h4>
                                                @foreach($Attrs[0] as $attr)
                                                    <div class="dropdown-item">
                                                        <i class="{{$attr->file}}"></i> {{$attr->title}} <a
                                                            href="/admin/estate/setting/removeAttr/{{$attr->id}}"
                                                            class="badge badge-danger ml-auto">حذف</a>
                                                    </div>
                                                @endforeach
                                            @endif
                                        </div>
                                        <div class="col-6">
                                            @if(sizeof($Attrs[1])>=0)
                                                <h4>ویژگی های آپارتمان</h4>
                                                @foreach($Attrs[1] as $attr)
                                                    <div class="dropdown-item">
                                                        <i class="{{$attr->file}}"></i> {{$attr->title}} <a
                                                            href="/admin/estate/setting/removeAttr/{{$attr->id}}"
                                                            class="badge badge-danger ml-auto">حذف</a>
                                                    </div>
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </form>
                        <div id="modal_full" class="modal fade" tabindex="-1">
                            <div class="modal-dialog modal-full">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">انتخاب ایکون</h5>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="row">
                                                    @foreach($json as $icon=>$val)
                                                        @if(isset($val['svg']['brands']['raw']))
                                                            @php
                                                                $name = '"fab fa-'.$icon.'"';
                                                                $b = $val['svg']['brands']['raw'];
                                                                echo "<div class='col-1 mt-1'><a href='javascript:;' onclick='iconSel($name)'>".$b."</a></div>";
                                                            @endphp
                                                        @endif
                                                    @endforeach
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="row">
                                                    @foreach($json as $icon=>$val)
                                                        @if(isset($val['svg']['solid']))
                                                            @php
                                                                $name = '"fas fa-' .$icon.'"';
                                                                $b = $val['svg']['solid']['raw'];
                                                                echo "<div class='col-1 mt-1'><a href='javascript:;' onclick='iconSel($name)'>".$b."</a></div>";
                                                            @endphp
                                                        @endif
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="filesSetting">
                        <form action="/admin/estate/setting/storeAttr" method="post">
                            {{csrf_field()}}
                            <div class="row">
                                <div class="col-4">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="title">عنوان ویژگی</label>
                                                <input type="text" name="title" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="type">ویژگی برای</label>
                                                <select name="type" id="type" class="form-control" required>
                                                    <option value="">انتخاب نمایید.</option>
                                                    <option value="possibilitiesVila">ویلا</option>
                                                    <option value="possibilities">آپراتمان</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12 text-black-50">
                                            <button type="button" class="btn btn-outline-info" data-toggle="modal"
                                                    data-target="#modal_full"><i class="icon-arrow-left12 mr-2"></i>
                                                انتخاب ایکون
                                            </button>
                                            <i id="iconShow" class="float-right"></i>
                                            <input type="hidden" name="file" id="icon" value="">
                                        </div>
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-block btn-primary mt-2">افزودن</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-8">
                                    <div class="row">
                                        <div class="col-6">
                                            @if(sizeof($Attrs[0])>=1)
                                                <h4>ویژگی های ویلا</h4>
                                                @foreach($Attrs[0] as $attr)
                                                    <div class="dropdown-item">
                                                        <i class="{{$attr->file}}"></i> {{$attr->title}} <a
                                                            href="/admin/estate/setting/removeAttr/{{$attr->id}}"
                                                            class="badge badge-danger ml-auto">حذف</a>
                                                    </div>
                                                @endforeach
                                            @endif
                                        </div>
                                        <div class="col-6">
                                            @if(sizeof($Attrs[1])>=0)
                                                <h4>ویژگی های آپارتمان</h4>
                                                @foreach($Attrs[1] as $attr)
                                                    <div class="dropdown-item">
                                                        <i class="{{$attr->file}}"></i> {{$attr->title}} <a
                                                            href="/admin/estate/setting/removeAttr/{{$attr->id}}"
                                                            class="badge badge-danger ml-auto">حذف</a>
                                                    </div>
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </form>
                        <div id="modal_full" class="modal fade" tabindex="-1">
                            <div class="modal-dialog modal-full">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">انتخاب ایکون</h5>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="row">
                                                    @foreach($json as $icon=>$val)
                                                        @if(isset($val['svg']['brands']['raw']))
                                                            @php
                                                                $name = '"fab fa-'.$icon.'"';
                                                                $b = $val['svg']['brands']['raw'];
                                                                echo "<div class='col-1 mt-1'><a href='javascript:;' onclick='iconSel($name)'>".$b."</a></div>";
                                                            @endphp
                                                        @endif
                                                    @endforeach
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="row">
                                                    @foreach($json as $icon=>$val)
                                                        @if(isset($val['svg']['solid']))
                                                            @php
                                                                $name = '"fas fa-' .$icon.'"';
                                                                $b = $val['svg']['solid']['raw'];
                                                                echo "<div class='col-1 mt-1'><a href='javascript:;' onclick='iconSel($name)'>".$b."</a></div>";
                                                            @endphp
                                                        @endif
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div id="modal_changeRole" class="modal fade" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h6 class="modal-title">افزودن موقعیت شهری و منطقه ای</h6>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body text-black-50" id="modal_changeRole_body">

                </div>
            </div>
        </div>
    </div>
@endsection
