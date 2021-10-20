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
                    <form class="row mb-30" action="{{route('classrooms.store')}}" method="POST" style="padding: 30px;">
                        @csrf
                        <div class="repeater">
                            <div data-repeater-list="List_Classes">
                                <div data-repeater-item style="margin-bottom: 20px;">
                                    <div class="row">
                                        <div class="col">
                                            <label for="name_en" class="mr-sm-2">{{trans('classrooms.name_en')}}</label>
                                            <input class="form-control" type="text" name="name_en" />
                                            @error('List_Classes.*.name_en')
                                            <div>{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col">
                                            <label for="name_ar" class="mr-sm-2">{{trans('classrooms.name_ar')}}</label>
                                            <input class="form-control" type="text" name="name_ar" />
                                            @error('List_Classes.*.name_ar')
                                            <div>{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col">
                                            <label for="grades" class="mr-sm-2">{{trans('grades.grade')}}</label>
                                            <div class="box">
                                                <select required class="fancyselect" name="grade">
                                                    @foreach($grades as $grade)
                                                        <option value="{{$grade->id}}">{{$grade->name}}</option>
                                                    @endforeach
                                                </select>
                                                @error('List_Classes.*.grade')
                                                <div>{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col">
                                            <label class="mr-sm-2"><br></label>
                                            <input class="btn btn-danger btn-block" data-repeater-delete
                                                   type="button" value="{{trans('main.delete')}}" style="padding: 13px 15px 13px 20px;" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-20">
                                <div class="col-12">
                                    <input class="button" data-repeater-create type="button" value="{{trans('main.add-item')}}"/>
                                    <br><br>
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
