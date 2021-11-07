@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{trans('students.edit')}}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    {{trans('students.edit')}}
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

                    <form method="post" action="{{ route('students.update', $student->id) }}" autocomplete="off">
                        @csrf
                        {{method_field('PUT')}}
                        <h6 style="font-family: 'Cairo', sans-serif;color: blue">{{trans('students.personal_info')}}</h6><br>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{trans('students.name_ar')}} : <span class="text-danger">*</span></label>
                                    <input type="text" name="name_ar" class="form-control" value="{{$student->getTranslation('name', 'ar')}}">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{trans('students.name_en')}} : <span class="text-danger">*</span></label>
                                    <input class="form-control" name="name_en" type="text" value="{{$student->getTranslation('name', 'en')}}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{trans('main.email')}} : </label>
                                    <input type="email"  name="email" class="form-control" value="{{$student->email}}">
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{trans('main.password')}} :</label>
                                    <input type="password" name="password" class="form-control" value="{{$student->password}}">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="gender">{{trans('students.gender')}} : <span class="text-danger">*</span></label>
                                    <select class="custom-select mr-sm-2" name="gender_id">
                                        <option selected disabled>{{trans('main.choose')}}...</option>
                                        @foreach($genders as $gender)
                                            <option
                                                @if($student->gender_id === $gender->id) selected @endif
                                                value="{{ $gender->id }}">{{ $gender->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="nal_id">{{trans('students.nationality')}} : <span class="text-danger">*</span></label>
                                    <select class="custom-select mr-sm-2" name="nationality_id">
                                        <option selected disabled>{{trans('main.choose')}}...</option>
                                        @foreach($nationalities as $nationality)
                                            <option
                                                @if($student->nationality_id === $nationality->id) selected @endif
                                                value="{{ $nationality->id }}">{{ $nationality->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="bg_id">{{trans('students.blood')}} : </label>
                                    <select class="custom-select mr-sm-2" name="blood_id">
                                        <option selected disabled>{{trans('main.choose')}}...</option>
                                        @foreach($bloods as $bg)
                                            <option
                                                @if($student->blood_type_id === $bg->id) selected @endif
                                                value="{{ $bg->id }}">{{ $bg->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>{{trans('students.birth')}}  :</label>
                                    <input class="form-control" type="text"  id="datepicker-action" name="date_birth" data-date-format="yyyy-mm-dd" value="{{$student->date_birth}}">
                                </div>
                            </div>

                        </div>

                        <h6 style="font-family: 'Cairo', sans-serif;color: blue">{{trans('students.student_info')}}</h6><br>
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="Grade_id">{{trans('students.grade')}} : <span class="text-danger">*</span></label>
                                    <select class="custom-select mr-sm-2" name="grade_id">
                                        <option selected disabled>{{trans('main.choose')}}...</option>
                                        @foreach($grades as $g)
                                            <option
                                                @if($student->grade_id === $g->id) selected @endif
                                                value="{{ $g->id }}">{{ $g->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="classroom_id">{{trans('students.classroom')}} : <span class="text-danger">*</span></label>
                                    <select class="custom-select mr-sm-2" name="classroom_id">
                                        @foreach($classrooms as $classroom)
                                            @if($student->classroom_id === $classroom->id)
                                                <option value="{{$classroom->id}}" selected>{{$classroom->name}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="section_id">{{trans('students.section')}} : </label>
                                    <select class="custom-select mr-sm-2" name="section_id">
                                        @foreach($sections as $section)
                                            @if($student->section_id === $section->id)
                                                <option value="{{$section->id}}" selected>{{$section->name}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="parent_id">{{trans('students.parent')}} : <span class="text-danger">*</span></label>
                                    <select class="custom-select mr-sm-2" name="parent_id">
                                        <option selected disabled>{{trans('main.choose')}}...</option>
                                        @foreach($parents as $parent)
                                            <option
                                                @if($student->parent_id === $parent->id) selected @endif
                                                value="{{ $parent->id }}">{{ $parent->father_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="academic_year">{{trans('students.academic_year')}} : <span class="text-danger">*</span></label>
                                    <select class="custom-select mr-sm-2" name="academic_year">
                                        <option selected disabled>{{trans('main.choose')}}...</option>
                                        @php
                                            $current_year = date("Y");
                                        @endphp
                                        @for($year=$current_year; $year<=$current_year +1 ;$year++)
                                            <option
                                                @if($student->academic_year == $year) selected @endif
                                                value="{{ $year}}">{{ $year }}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                        </div><br>
                        <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit">{{trans('main.save')}}</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
@endsection
@section('js')
    <script>
        $(document).ready(function () {
            $('select[name="grade_id"]').on('change', function () {
                var Grade_id = $(this).val();
                if (Grade_id) {
                    $.ajax({
                        url: "{{ URL::to('classes') }}/" + Grade_id,
                        type: "GET",
                        dataType: "json",
                        success: function (data) {
                            $('select[name="classroom_id"]').empty();
                            $('select[name="classroom_id"]').append('<option disabled selected> {{trans('main.choose')}} </option>');
                            $.each(data, function (key, value) {
                                $('select[name="classroom_id"]').append('<option value="' + key + '">' + value + '</option>');
                            });
                        },
                    });
                } else {
                    console.log('AJAX load did not work');
                }
            });

            $('select[name="classroom_id"]').on('change', function () {
                var classroom_id = $(this).val();
                if (classroom_id) {
                    $.ajax({
                        url: "{{ URL::to('getSections') }}/" + classroom_id,
                        type: "GET",
                        dataType: "json",
                        success: function (data) {
                            $('select[name="section_id"]').empty();
                            $('select[name="section_id"]').append('<option disabled selected> {{trans('main.choose')}} </option>');
                            $.each(data, function (key, value) {
                                $('select[name="section_id"]').append('<option value="' + key + '">' + value + '</option>');
                            });
                        },
                    });
                } else {
                    console.log('AJAX load did not work');
                }
            });
        });
    </script>
    @toastr_js
    @toastr_render
@endsection
