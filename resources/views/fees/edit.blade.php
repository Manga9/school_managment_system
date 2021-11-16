@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{trans('fees.update')}}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    {{trans('fees.update')}}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">

                    <form method="post" action="{{ route('fees.update', $fee->id) }}" autocomplete="off">
                        @csrf
                        {{method_field('PUT')}}
                        <div class="form-row">
                            <div class="form-group col">
                                <label for="inputEmail4">{{trans('fees.name_ar')}}</label>
                                <input type="text" value="{{$fee->getTranslation('title', 'ar')}}" name="title_ar" class="form-control">
                                @error('title_ar')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="form-group col">
                                <label for="inputEmail4">{{trans('fees.name_en')}}</label>
                                <input type="text" value="{{$fee->getTranslation('title', 'en')}}" name="title_en" class="form-control">
                                @error('title_en')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="form-group col">
                                <label for="inputEmail4">{{trans('fees.amount')}}</label>
                                <input type="number" value="{{ $fee->amount }}" name="amount" class="form-control">
                                @error('amount')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>

                        </div>

                        <div class="form-row">
                            <div class="form-group col">
                                <label for="inputState">{{trans('students.grade')}}</label>
                                <select class="custom-select mr-sm-2" name="grade_id">
                                    <option selected disabled>{{trans('main.choose')}}...</option>
                                    @foreach($grades as $grade)
                                        <option
                                        @if($grade->id == $fee->grade_id) selected @endif
                                         value="{{ $grade->id }}">{{ $grade->name }}</option>
                                    @endforeach
                                </select>
                                @error('grade_id')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="form-group col">
                                <label for="inputZip">{{trans('students.classroom')}}</label>
                                <select class="custom-select mr-sm-2" name="classroom_id">
                                    @foreach($classrooms as $classroom)
                                    <option
                                    @if($classroom->id == $fee->classroom_id) selected @endif
                                     value="{{ $classroom->id }}">{{ $classroom->name }}</option>
                                @endforeach
                                </select>
                                @error('classroom_id')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group col">
                                <label for="inputZip">{{trans('students.academic_year')}}</label>
                                <select class="custom-select mr-sm-2" name="year">
                                    <option selected disabled>{{trans('main.choose')}}...</option>
                                    @php
                                        $current_year = date("Y")
                                    @endphp
                                    @for($year=$current_year; $year<=$current_year +1 ;$year++)
                                        <option
                                        @if($year == $fee->year) selected @endif
                                        value="{{ $year}}">{{ $year }}</option>
                                    @endfor
                                </select>
                                @error('year')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputAddress">{{trans('main.note')}}</label>
                            <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="4">{{$fee->description}}</textarea>
                        </div>
                        <br>

                        <button type="submit" class="btn btn-primary">{{trans('main.save')}}</button>

                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    @toastr_js
    @toastr_render
@endsection