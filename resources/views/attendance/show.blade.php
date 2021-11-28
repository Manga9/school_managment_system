@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')

{{trans('attendance.list')}}@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    {{trans('attendance.list')}}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <h5 style="font-family: 'Cairo', sans-serif;color: red"> {{trans('main.today')}} : {{ date('Y-m-d') }}</h5>
    <form method="post" action="{{ route('attendance.store') }}">

        @csrf
        <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
               style="text-align: center">
            <thead>
            <tr>
                <th class="alert-success">#</th>
                <th class="alert-success">{{ trans('main.name') }}</th>
                <th class="alert-success">{{ trans('main.email') }}</th>
                <th class="alert-success">{{ trans('students.gender') }}</th>
                <th class="alert-success">{{ trans('students.grade') }}</th>
                <th class="alert-success">{{ trans('students.classroom') }}</th>
                <th class="alert-success">{{ trans('students.section') }}</th>
                <th class="alert-success">{{ trans('main.controls') }}</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($students as $student)
                <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->email }}</td>
                    <td>{{ $student->gender->name }}</td>
                    <td>{{ $student->grade->name }}</td>
                    <td>{{ $student->classroom->name }}</td>
                    <td>{{ $student->section->name }}</td>
                    <td>

                        @if(isset($student->attendance()->where('attendence_date', date('y-m-d'))->first()->student_id))

                            <label class="block text-gray-500 font-semibold sm:border-r sm:pr-4">
                                <input name="attendences[{{ $student->id }}]" disabled
                                       {{ $student->attendance()->first()->attendence_status === 1 ? 'checked' : '' }}
                                       class="leading-tight" type="radio" value="1">
                                <span class="text-success">{{trans('attendance.presence')}}</span>
                            </label>

                            <label class="ml-4 block text-gray-500 font-semibold">
                                <input name="attendences[{{ $student->id }}]" disabled
                                       {{ $student->attendance()->first()->attendence_status === 0 ? 'checked' : '' }}
                                       class="leading-tight" type="radio" value="0">
                                <span class="text-danger">{{trans('attendance.absent')}}</span>
                            </label>

                        @else

                            <label class="block text-gray-500 font-semibold sm:border-r sm:pr-4">
                                <input name="attendences[{{ $student->id }}]" class="leading-tight" type="radio"
                                       value="1">
                                <span class="text-success">{{trans('attendance.presence')}}</span>
                            </label>

                            <label class="ml-4 block text-gray-500 font-semibold">
                                <input name="attendences[{{ $student->id }}]" class="leading-tight" type="radio"
                                       value="0">
                                <span class="text-danger">{{trans('attendance.absent')}}</span>
                            </label>

                        @endif

                        <input type="hidden" name="grade_id" value="{{ $student->grade_id }}">
                        <input type="hidden" name="classroom_id" value="{{ $student->classroom_id }}">
                        <input type="hidden" name="section_id" value="{{ $student->section_id }}">

                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <P>
            <button class="btn btn-success" type="submit">{{ trans('main.save') }}</button>
        </P>
    </form><br>
    <!-- row closed -->
@endsection
@section('js')
    @toastr_js
    @toastr_render
@endsection