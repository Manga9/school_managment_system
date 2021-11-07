@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{trans('students.promotionsCreate')}}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    {{trans('students.promotionsCreate')}}
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
                                    <a href="{{route('promotions.create')}}" class="btn btn-primary btn-sm">{{trans('students.promotionsCreate')}}</a>
                                    <br><br>
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                           data-page-length="50"
                                           style="text-align: center">
                                        <thead>
                                        <tr>
                                            <th class="alert-info">#</th>
                                            <th class="alert-info">{{trans('students.name')}}</th>
                                            <th class="alert-danger">{{trans('students.old_grade')}}</th>
                                            <th class="alert-danger">{{trans('students.old_classroom')}}</th>
                                            <th class="alert-danger">{{trans('students.old_section')}}</th>
                                            <th class="alert-danger">{{trans('students.old_academic')}}</th>
                                            <th class="alert-success">{{trans('students.new_grade')}}</th>
                                            <th class="alert-success">{{trans('students.new_classroom')}}</th>
                                            <th class="alert-success">{{trans('students.new_section')}}</th>
                                            <th class="alert-success">{{trans('students.new_academic')}}</th>
                                            <th>{{trans('main.controls')}}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($promotions as $promotion)
                                            <tr>
                                                <td>{{ $loop->index+1 }}</td>
                                                <td>{{$promotion->student->name}}</td>
                                                <td>{{$promotion->grade->name}}</td>
                                                <td>{{$promotion->classroom->name}}</td>
                                                <td>{{$promotion->section->name}}</td>
                                                <td>{{$promotion->old_academic}}</td>
                                                <td>{{$promotion->grade_to->name}}</td>
                                                <td>{{$promotion->classroom_to->name}}</td>
                                                <td>{{$promotion->section_to->name}}</td>
                                                <td>{{$promotion->new_academic}}</td>
                                                <td>
                                                    <a href="{{route('promotions.edit', $promotion->id)}}" class="btn btn-outline-success btn-sm"><i class="fa fa-pencil"></i></a>
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
