@extends('admin.layouts.admin_content_layout')
@section('meta')
@stop
@section('css')
    <link href="{{url('/public/assets/webfonts/fontawsome/css/all.css')}}" rel="stylesheet" type="text/css">
    <style>
        svg {
            width: 25px;
            height: 25px;
        }
    </style>
@stop
@section('js')
    <script>
        function iconSel(name) {
            $("#modal_full").modal('hide');
            var icon = $("#iconShow");
            $("#icon").val(name);
            icon.addClass(name + " fa-3x");
        }


        $('.tree-default').fancytree({
            init: function(event, data) {
                $('.has-tooltip .fancytree-title').tooltip();
            }
        });
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
                </ul>
                <div class="tab-content text-black-50">
                    <div class="tab-pane fade show active" id="cityPanel">
                        <div class="tree-default">
                            <ul class="mb-0">
                                <li class="folder expanded">Expanded folder with children
                                    <ul>
                                        <li class="expanded">Expanded sub-item
                                            <ul>
                                                <li class="active focused">Active sub-item (active and focus on init)</li>
                                                <li>Basic <i>menu item</i> with <strong class="font-weight-semibold">HTML support</strong></li>
                                            </ul>
                                        </li>
                                        <li>Collapsed sub-item
                                            <ul>
                                                <li>Sub-item 2.2.1</li>
                                                <li>Sub-item 2.2.2</li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li class="has-tooltip" title="Look, a tool tip!">Menu item with key and tooltip</li>
                                <li class="folder">Collapsed folder
                                    <ul>
                                        <li>Sub-item 1.1</li>
                                        <li>Sub-item 1.2</li>
                                    </ul>
                                </li>
                                <li class="selected">This is a selected item</li>
                            </ul>
                        </div>
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
                </div>
            </div>
        </div>
    </div>
@endsection
