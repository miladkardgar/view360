@extends('admin.layouts.admin_content_layout')

@section('meta')
@stop
@section('css')
@stop
@section('js')
@stop
@section('content')
    <div class="card">
        <div class="card-body text-black-50">
            <table class="table">
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
                    <tr>
                        <td>{{$contact->name}}</td>
                        <td>{{$contact->email}}</td>
                        <td>{{$contact->phone}}</td>
                        <td>{{$contact->subject}}</td>
                        <td>{{$contact->message}}</td>
                        <td>{{$contact->file_id}}</td>
                        <td>{{$contact->read_status}}</td>
                        <td><a href="/admin/setting/contact/view/{{$contact->id}}" class="btn btn-info btn-xs"><i class="icon-eye"></i></a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
