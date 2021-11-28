@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{trans('exam.edit')}}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    {{trans('exam.edit')}}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="col-xs-12">
                        <div class="col-md-12">
                            <br>
                            <form action="{{route('exams.update', $exam->id)}}" method="post" autocomplete="off">
                                @csrf
                                {{method_field('PUT')}}
                                <div class="form-row">
                                    <div class="col">
                                        <label for="title">{{trans('exam.name_ar')}}</label>
                                        <input type="text" name="name_ar" class="form-control" value="{{$exam->getTranslation('name', 'ar')}}">
                                    </div>

                                    <div class="col">
                                        <label for="title">{{trans('exam.name_en')}}</label>
                                        <input type="text" name="name_en" class="form-control" value="{{$exam->getTranslation('name', 'en')}}">
                                    </div>

                                    <div class="col">
                                        <label for="title">{{trans('exam.term')}}</label>
                                        <input type="number" name="term" class="form-control" value="{{$exam->term}}">
                                    </div>
                                </div>
                                <br>
                                <div class="form-row">
                                    <div class="form-group col">
                                        <label for="inputState">{{trans('students.grade')}}</label>
                                        <select class="custom-select my-1 mr-sm-2" name="grade_id">
                                            <option selected disabled>{{trans('main.choose')}}...</option>
                                            @foreach($grades as $grade)
                                                <option
                                                @if($grade->id == $exam->grade_id) selected @endif 
                                                value="{{$grade->id}}">{{$grade->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group col">
                                        <label for="inputState">{{trans('students.classroom')}}</label>
                                        <select name="classroom_id" class="custom-select">
                                            @foreach($classrooms as $classroom)
                                            <option
                                            @if($classroom->id == $exam->classroom_id) selected @endif 
                                            value="{{$classroom->id}}">{{$classroom->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col">
                                        <label for="inputState">{{trans('subjects.name')}}</label>
                                        <select class="custom-select my-1 mr-sm-2" name="subject_id">
                                            @foreach($subjects as $subject)
                                            <option
                                            @if($subject->id == $exam->subject_id) selected @endif 
                                            value="{{$subject->id}}">{{$subject->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col">
                                        <label for="inputState">{{trans('teachers.teacher')}}</label>
                                        <select class="custom-select my-1 mr-sm-2" name="teacher_id">
                                            <option selected disabled>{{trans('main.choose')}}...</option>
                                            @foreach($teachers as $teacher)
                                                <option
                                                @if($teacher->id == $exam->teacher_id) selected @endif 
                                                value="{{$teacher->id}}">{{$teacher->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col">
                                        <label for="academic_year">{{trans('students.academic_year')}} : <span class="text-danger">*</span></label>
                                        <select class="custom-select mr-sm-2" name="academic_year">
                                            <option selected disabled>{{trans('main.choose')}}...</option>
                                            @php
                                                $current_year = date("Y");
                                            @endphp
                                            @for($year=$current_year; $year<=$current_year +1 ;$year++)
                                                <option 
                                                @if ($year == $exam->academic_year) selected @endif
                                                value="{{ $year}}">{{ $year }}</option>
                                            @endfor
                                        </select>
                                    </div>

                                </div>
                                <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit">{{trans('main.save')}}</button>
                            </form>
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