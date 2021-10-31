@extends('layouts.master')
@section('css')

@section('title')
{{trans('sections.add')}}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0">{{trans('sections.add')}}</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}" class="default-color">{{trans('main.home')}}</a></li>
                    <li class="breadcrumb-item active">{{trans('sections.add')}}</li>
                </ol>
                <br>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <form method="Post" action="{{route('sections.store')}}">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="name_en" class="form-label">{{trans('sections.name_en')}}</label>
                                    <input required type="text" class="form-control" id="name_en" name="name_en" value="{{ old('name_en') }}">
                                    @error('name_en')
                                    <div>{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="name_ar" class="form-label">{{trans('sections.name_ar')}}</label>
                                    <input required type="text" class="form-control" id="name_ar" name="name_ar" value="{{ old('name_ar') }}">
                                    @error('name_ar')
                                    <div>{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="teacher" class="form-label">{{trans('teachers.teacher')}}</label>
                                    <div class="box">
                                        <select required class="form-control" name="teacher" id="teacher">
                                            <option selected disabled>{{trans('teachers.choose')}}</option>
                                            @foreach($teachers as $teacher)
                                                <option value="{{$teacher->id}}">{{$teacher->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('teacher')
                                        <div>{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="grades" class="mr-sm-2">{{trans('grades.grade')}}</label>
                                <div class="box">
                                    <select required class="form-control" name="grade">
                                        <option selected disabled>{{trans('grades.choose')}}</option>
                                        @foreach($grades as $grade)
                                            <option value="{{$grade->id}}">{{$grade->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('grade')
                                    <div>{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="classroom" class="mr-sm-2">{{trans('classrooms.classroom')}}</label>
                                <div class="box">
                                    <select required class="form-control" name="classroom">
                                    </select>
                                    @error('classroom')
                                    <div>{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <br><br>
                        @error('error')
                        <br>
                        <div class="alert alert-danger">{{ $message }}</div>
                        <br>
                        @enderror
                        <button type="submit" class="btn btn-primary">{{trans('sections.add')}}</button>
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
            $('select[name="grade"]').on('change', function () {
                var Grade_id = $(this).val();
                if (Grade_id) {
                    $.ajax({
                        url: "{{ URL::to('classes') }}/" + Grade_id,
                        type: "GET",
                        dataType: "json",
                        success: function (data) {
                            $('select[name="classroom"]').empty();
                            $.each(data, function (key, value) {
                                $('select[name="classroom"]').append('<option value="' + key + '">' + value + '</option>');
                            });
                        },
                    });
                } else {
                    console.log('AJAX load did not work');
                }
            });
        });
    </script>
@endsection
