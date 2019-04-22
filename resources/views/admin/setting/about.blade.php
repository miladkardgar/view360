@extends('admin.layouts.admin_content_layout')
@section('title','تنظیمات درباره ما')
@section('meta')
@stop
@section('css')
@stop
@section('js')
    <script src="{{url('public/assets/admin/js/plugins/ckeditor/ckeditor.js')}}"></script>
    <script>
        $(document).ready(function () {
            CKEDITOR.replace("text", {
                filebrowserUploadUrl:'/upload_image',
                filebrowserImageUploadUrl:'/dashboard/administrator/attachImage'
            })

        });
    </script>
@stop
@section('content')
    <div class="card">
        <div class="card-body">

            <form action="/admin/setting/about/store" method="post" class="text-black-50">
                {{csrf_field()}}
                <ul class="nav nav-tabs nav-tabs-highlight nav-justified">
                    <li class="nav-item"><a href="#highlighted-justified-tab1" class="nav-link active"
                                            data-toggle="tab">متن
                            اصلی</a></li>
{{--                    <li class="nav-item"><a href="#highlighted-justified-tab2" class="nav-link" data-toggle="tab">نمایش--}}
{{--                            هیت--}}
{{--                            مدیره</a></li>--}}
{{--                    <li class="nav-item"><a href="#highlighted-justified-tab3" class="nav-link" data-toggle="tab">پیام--}}
{{--                            مدیریت</a></li>--}}
{{--                    <li class="nav-item"><a href="#highlighted-justified-tab4" class="nav-link"--}}
{{--                                            data-toggle="tab">شمارنده</a></li>--}}
{{--                    <li class="nav-item"><a href="#highlighted-justified-tab5" class="nav-link"--}}
{{--                                            data-toggle="tab">لوگوها</a></li>--}}
                </ul>

                <div class="tab-content text-black-50">
                    <div class="tab-pane fade show active" id="highlighted-justified-tab1">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="textStatus" name="textStatus"
                                   @if(isset($option->textStatus) && $option->textStatus==1)
                                   checked
                                @endif>
                            <label class="custom-control-label" for="textStatus">نمایش متن اصلی</label>
                        </div>
                        <hr>
                        <h4 class="text-center">اطلاعات مربوط به صفحه درباره ما را در کادر زیر وارد نمایید.</h4>
                        <div class="form-group">
                            <label for="editor">متن</label>
                            <textarea contenteditable="true" name="text" id="text" cols="30" rows="10">
                        @if(isset($option->text) && $option->text!="")
                                    {{html_entity_decode($option->text)}}
                                @endif
                    </textarea>
                        </div>

                    </div>
{{--                    <div class="tab-pane fade" id="highlighted-justified-tab2">--}}
{{--                        <div class="custom-control custom-checkbox">--}}
{{--                            <input type="checkbox" class="custom-control-input" id="managerStatus" name="managerStatus"--}}
{{--                                   @if(isset($option->managerStatus) && $option->managerStatus==1) checked @endif>--}}
{{--                            <label class="custom-control-label" for="managerStatus">نمایش اعضاء مدیریت</label>--}}
{{--                        </div>--}}
{{--                        <hr>--}}
{{--                        <div class="row">--}}
{{--                            <div class="col-4">--}}
{{--                                <div class="form-group">--}}
{{--                                    <label for="selectManager">انتخاب مدیر</label>--}}
{{--                                    <select name="selectManager" id="selectManager" class="form-control">--}}
{{--                                        @foreach($usersList as $user)--}}
{{--                                            <option value="{{$user->id}}">{{$user->name." ".$user['family']}}</option>--}}
{{--                                        @endforeach--}}
{{--                                    </select>--}}
{{--                                </div>--}}
{{--                                <div class="btn-group float-right">--}}
{{--                                    <button type="submit" class="btn btn-success">افزودن</button>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="tab-pane fade" id="highlighted-justified-tab3">--}}
{{--                        <div class="custom-control custom-checkbox">--}}
{{--                            <input type="checkbox" class="custom-control-input" id="noticeStatus" name="noticeStatus"--}}
{{--                                   @if(isset($option->noticeStatus) && $option->noticeStatus==1) checked @endif>--}}
{{--                            <label class="custom-control-label" for="noticeStatus">نمایش پیام مدیریت</label>--}}
{{--                        </div>--}}
{{--                        <hr>--}}
{{--                        <div class="row">--}}
{{--                            <div class="col-4">--}}
{{--                                <div class="form-group">--}}
{{--                                    <label for="selectUser">انتخاب کاربر</label>--}}
{{--                                    <select name="selectUser" id="selectUser" class="form-control">--}}
{{--                                        @foreach($usersList as $user)--}}
{{--                                            <option value="{{$user->id}}">{{$user->name." ".$user['family']}}</option>--}}
{{--                                        @endforeach--}}
{{--                                    </select>--}}
{{--                                </div>--}}
{{--                                <div class="form-group">--}}
{{--                                    <label for="notice">پیام</label>--}}
{{--                                    <textarea name="notice" id="notice" cols="30" class="form-control"--}}
{{--                                              rows="5"></textarea>--}}
{{--                                </div>--}}
{{--                                <div class="btn-group float-right">--}}
{{--                                    <button type="submit" class="btn btn-success">افزودن</button>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="tab-pane fade" id="highlighted-justified-tab4">--}}
{{--                        <div class="custom-control custom-checkbox">--}}
{{--                            <input type="checkbox" class="custom-control-input" id="counterStatus" name="counterStatus"--}}
{{--                                   @if(isset($option->counterStatus) && $option->counterStatus==1) checked @endif >--}}
{{--                            <label class="custom-control-label" for="counterStatus">نمایش شمارنده</label>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="tab-pane fade" id="highlighted-justified-tab5">--}}
{{--                        <div class="custom-control custom-checkbox">--}}
{{--                            <input type="checkbox" class="custom-control-input" id="logosStatus" name="logosStatus"--}}
{{--                                   @if(isset($option->logosStatus) && $option->logosStatus==1) checked @endif >--}}
{{--                            <label class="custom-control-label" for="logosStatus">نمایش لوگو</label>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                </div>
                <hr>
                <div class="btn-group float-right">
                    <button type="submit" class="btn btn-success">ذخیره اطلاعات</button>
                </div>
            </form>

        </div>
    </div>
@endsection
