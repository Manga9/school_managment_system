@extends('layouts.master')
@section('css')

@section('title')
    Grades
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0">{{trans('grades.add')}}</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}" class="default-color">{{trans('main.home')}}</a></li>
                    <li class="breadcrumb-item active">{{trans('grades.add')}}</li>
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
                    <form method="Post" action="{{route('grades.store')}}">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="name_en" class="form-label">{{trans('grades.name_en')}}</label>
                                    <input required type="text" class="form-control" id="name_en" name="name_en" value="{{ old('name_en') }}">
                                    @error('name_en')
                                    <div>{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="note_en" class="form-label">{{trans('grades.note_en')}}</label>
                                    <textarea name="note_en" class="form-control" id="note_en">{{ old('note_en') }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="name_ar" class="form-label">{{trans('grades.name_ar')}}</label>
                                    <input required type="text" class="form-control" id="name_ar" name="name_ar" value="{{ old('name_ar') }}">
                                    @error('name_ar')
                                    <div>{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="note_ar" class="form-label">{{trans('grades.note_ar')}}</label>
                                    <textarea name="note_ar" class="form-control" id="note_ar">{{ old('note_ar') }}</textarea>
                                </div>
                            </div>
                        </div>
                        @error('error')
                        <br>
                        <div class="alert alert-danger">{{ $message }}</div>
                        <br>
                        @enderror
                        <button type="submit" class="btn btn-primary">{{trans('grades.add')}}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
@endsection
@section('js')

@endsection
