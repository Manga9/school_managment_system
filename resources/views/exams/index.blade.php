@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
   {{trans('exam.exams-list')}}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    {{trans('exam.exams-list')}}
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
                                <a href="{{route('exams.create')}}" class="btn btn-success btn-sm" role="button"
                                   aria-pressed="true">{{trans('exam.add')}}</a><br><br>
                                <div class="table-responsive">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                           data-page-length="50"
                                           style="text-align: center">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>{{trans('exam.name')}}</th>
                                            <th>{{trans('subjects.name')}}</th>
                                            <th>{{trans('students.grade')}}</th>
                                            <th>{{trans('students.classroom')}}</th>
                                            <th>{{trans('exam.term')}}</th>
                                            <th>{{trans('students.academic_year')}}</th>
                                            <th>{{trans('main.controls')}}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($exams as $exam)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$exam->name}}</td>
                                                <td>{{$exam->subject->name}}</td>
                                                <td>{{$exam->grade->name}}</td>
                                                <td>{{$exam->classroom->name}}</td>
                                                <td>{{$exam->term}}</td>
                                                <td>{{$exam->academic_year}}</td>
                                                <td>
                                                    <a href="{{route('exams.edit',$exam->id)}}"
                                                    class="btn btn-info btn-sm" role="button" aria-pressed="true"><i
                                                    class="fa fa-edit"></i></a>
                                                    <form method="Post" action="{{route('exams.destroy', $exam->id)}}" style="display: inline;">
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