@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{trans('students.graduatedTable')}}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    {{trans('students.graduatedTable')}}
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
                                <div class="table-responsive">
                                    <a href="{{route('graduates.create')}}" class="btn btn-primary btn-sm">{{trans('students.graduatedCreate')}}</a>
                                    <br><br>
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                           data-page-length="50"
                                           style="text-align: center">
                                        <thead>
                                        <tr>
                                            <th class="alert-info">#</th>
                                            <th class="alert-info">{{trans('students.name')}}</th>
                                            <th class="alert-danger">{{trans('students.grade')}}</th>
                                            <th class="alert-danger">{{trans('students.classroom')}}</th>
                                            <th class="alert-danger">{{trans('students.section')}}</th>
                                            <th class="alert-danger">{{trans('students.graduatedYear')}}</th>
                                            <th>{{trans('main.controls')}}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($students as $student)
                                            <tr>
                                                <td>{{ $loop->index+1 }}</td>
                                                <td>{{$student->name}}</td>
                                                <td>{{$student->grade->name}}</td>
                                                <td>{{$student->classroom->name}}</td>
                                                <td>{{$student->section->name}}</td>
                                                <td>{{$student->deleted_at}}</td>
                                                <td>
                                                    <form method="Post" action="{{route('graduates.update', $student->id)}}" style="display: inline;">
                                                        @csrf
                                                        {{method_field('PUT')}}
                                                        <button class="btn btn-outline-success btn-sm" type="submit">{{trans('students.retrieve')}}</button>
                                                    </form>
                                                    <form method="Post" action="{{route('graduates.destroy', $student->id)}}" style="display: inline;">
                                                        @csrf
                                                        {{method_field('DELETE')}}
                                                        <button class="btn btn-outline-danger btn-sm" type="submit" onclick="return confirm('{{trans("messages.confirm")}}')">{{trans('main.delete')}}</button>
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
