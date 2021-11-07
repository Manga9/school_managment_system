@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{trans('students.students-list')}}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    {{trans('students.students-list')}}
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
                                <a href="{{route('students.create')}}" class="btn btn-success btn-sm" role="button"
                                   aria-pressed="true">{{trans('students.add')}}</a><br><br>
                                <div class="table-responsive">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                           data-page-length="50"
                                           style="text-align: center">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>{{trans('main.name')}}</th>
                                            <th>{{trans('main.email')}}</th>
                                            <th>{{trans('students.gender')}}</th>
                                            <th>{{trans('students.grade')}}</th>
                                            <th>{{trans('students.classroom')}}</th>
                                            <th>{{trans('students.section')}}</th>
                                            <th>{{trans('students.birth')}}</th>
                                            <th>{{trans('students.blood')}}</th>
                                            <th>{{trans('students.nationality')}}</th>
                                            <th>{{trans('students.parent')}}</th>
                                            <th>{{trans('students.academic_year')}}</th>
                                            <th>{{trans('main.controls')}}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($students as $student)
                                            <tr>
                                                <td>{{ $loop->index+1 }}</td>
                                                <td>{{$student->name}}</td>
                                                <td>{{$student->email}}</td>
                                                <td>{{$student->gender->name}}</td>
                                                <td>{{$student->grade->name}}</td>
                                                <td>{{$student->classroom->name}}</td>
                                                <td>{{$student->section->name}}</td>
                                                <td>{{$student->date_birth}}</td>
                                                <td>{{$student->blood->name}}</td>
                                                <td>{{$student->nationality->name}}</td>
                                                <td>{{$student->myParent->father_name}}</td>
                                                <td>{{$student->academic_year}}</td>
                                                <td>
                                                    <a href="{{route('students.edit',$student->id)}}" class="btn btn-info btn-sm" role="button" aria-pressed="true"><i class="fa fa-edit"></i></a>
                                                    <form method="Post" action="{{route('students.destroy', $student->id)}}" style="display: inline;">
                                                        @csrf
                                                        {{method_field('DELETE')}}
                                                        <button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('{{trans("messages.confirm")}}')"><i class="ti-trash"></i></button>
                                                    </form>
                                                    <a href="{{route('students.show', $student->id)}}" class="btn btn-primary btn-sm" role="button" aria-pressed="true"><i class="fa fa-eye"></i></a>

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
