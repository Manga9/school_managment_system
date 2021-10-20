@extends('layouts.master')
@section('css')

@section('title')
    {{trans('sections.edit')}}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0">{{trans('sections.edit')}} ({{$section->name}})</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}" class="default-color">{{trans('main.home')}}</a></li>
                    <li class="breadcrumb-item active">{{trans('sections.edit')}}</li>
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
                    <form method="Post" action="{{route('sections.update', $section->id)}}">
                        @csrf
                        {{method_field('PUT')}}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="name_en" class="form-label">{{trans('sections.name_en')}}</label>
                                    <input required type="text" class="form-control" id="name_en" name="name_en" value="{{ $section->getTranslation('name', 'en') }}">
                                    @error('name_en')
                                    <div>{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="name_ar" class="form-label">{{trans('sections.name_ar')}}</label>
                                    <input required type="text" class="form-control" id="name_ar" name="name_ar" value="{{ $section->getTranslation('name', 'ar')  }}">
                                    @error('name_ar')
                                    <div>{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="grades" class="mr-sm-2">{{trans('grades.grade')}}</label>
                                <div class="box">
                                    <select required class="form-control" name="grade">
                                        <option selected disabled>{{trans('grades.choose')}}</option>
                                        @foreach($grades as $grade)
                                            <option @if($section->grade_id == $grade->id) selected @endif
                                                    value="{{$grade->id}}">{{$grade->name}}</option>
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
                                        @foreach($classrooms as $classroom)
                                            @if($classroom->grade_id == $section->grade_id)
                                                <option @if($classroom->id == $section->classroom_id) selected @endif
                                                        value="{{$classroom->id}}">{{$classroom->name}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @error('classroom')
                                    <div>{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <br><br>
                        <input type="checkbox" name="status" value="1" @if($section->status) checked @endif > {{trans('sections.status')}}
                        <br><br>
                        @error('error')
                        <br>
                        <div class="alert alert-danger">{{ $message }}</div>
                        <br>
                        @enderror
                        <button type="submit" class="btn btn-primary">{{trans('sections.edit')}}</button>
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
                            console.log(this.url);
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
