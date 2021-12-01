@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{trans('online.online-session')}}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
{{trans('online.online-session')}}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="col-xl-12 mb-30">
                        <div class="card card-statistics h-100">
                            <div class="card-body">
                                <a href="{{route('online.create')}}" class="btn btn-success" role="button" aria-pressed="true"> {{trans('online.add')}}</a>
                                {{-- <a class="btn btn-warning" href="{{route('indirect.create')}}">اضافة حصة اوفلاين جديدة</a> --}}
                                <div class="table-responsive">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                           data-page-length="50"
                                           style="text-align: center">
                                        <thead>
                                        <tr class="alert-success">
                                            <th>#</th>
                                            <th>{{trans('students.grade')}}</th>
                                            <th>{{trans('students.classroom')}}</th>
                                            <th>{{trans('students.section')}}</th>
                                            <th>{{trans('teachers.name')}}</th>
                                            <th>{{trans('online.topic')}}</th>
                                            <th>{{trans('online.start')}}</th>
                                            <th>{{trans('online.date')}}</th>
                                            <th>{{trans('online.link')}}</th>
                                            <th>{{trans('main.controls')}}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($onlineSessions as $session)
                                            <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{$session->grade->name}}</td>
                                            <td>{{ $session->classroom->name }}</td>
                                            <td>{{$session->section->name}}</td>
                                                <td>{{$session->user->name}}</td>
                                                <td>{{$session->topic}}</td>
                                                <td>{{$session->start_at}}</td>
                                                <td>{{$session->duration}}</td>
                                                <td class="text-danger"><a href="{{$session->join_url}}" target="_blank">{{trans('online.join')}}</a></td>
                                                <td>
                                                    <form method="Post" action="{{route('online.destroy', $session->id)}}" style="display: inline;">
                                                        @csrf
                                                        {{method_field('DELETE')}}
                                                        <button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('{{trans("messages.confirm")}}')"><i class="ti-trash"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
@endsection
@section('js')
    @toastr_js
    @toastr_render
@endsection