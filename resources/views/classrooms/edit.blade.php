@extends('layouts.master')
@section('css')

@section('title')
    {{trans('classrooms.edit')}}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0">{{trans('classrooms.edit')}} ({{$classroom->name}})</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}" class="default-color">{{trans('main.home')}}</a></li>
                    <li class="breadcrumb-item active">{{trans('classrooms.add')}}</li>
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
                    <form class="row mb-30" action="{{route('classrooms.update', $classroom->id)}}" method="POST" style="padding: 30px;">
                        @csrf
                        {{method_field('PUT')}}
                        <div class="repeater">
                            <div>
                                <div>
                                    <div class="row">
                                        <div class="col">
                                            <label for="name_en" class="mr-sm-2">{{trans('classrooms.name_en')}}</label>
                                            <input class="form-control" type="text" name="name_en" value="{{$classroom->getTranslation('name', 'en')}}" />
                                            @error('name_en')
                                            <div>{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col">
                                            <label for="name_ar" class="mr-sm-2">{{trans('classrooms.name_ar')}}</label>
                                            <input class="form-control" type="text" name="name_ar" value="{{$classroom->getTranslation('name', 'ar')}}" />
                                            @error('name_ar')
                                            <div>{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col">
                                            <label for="grades" class="mr-sm-2">{{trans('grades.grade')}}</label>
                                            <div class="box">
                                                <select required class="fancyselect" name="grade">
                                                    @foreach($grades as $grade)
                                                        <option
                                                            @if($grade->id === $classroom->grade_id) selected @endif
                                                            value="{{$grade->id}}">{{$grade->name}}</option>
                                                    @endforeach
                                                </select>
                                                @error('grade')
                                                <div>{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @error('error')
                            <br>
                            <div class="alert alert-danger">{{ $message }}</div>
                            <br>
                            @enderror
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success">{{ trans('main.save') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
@endsection
@section('js')

@endsection
