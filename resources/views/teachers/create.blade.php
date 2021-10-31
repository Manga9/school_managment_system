@extends('layouts.master')
@section('css')

@section('title')
    {{trans('teachers.add')}}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0">{{trans('teachers.add')}}</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}" class="default-color">{{trans('main.home')}}</a></li>
                    <li class="breadcrumb-item active">{{trans('teachers.add')}}</li>
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
                    <form method="Post" action="{{route('teachers.store')}}">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="email" class="form-label">{{trans('main.email')}}</label>
                                    <input required type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
                                    @error('email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="password" class="form-label">{{trans('main.password')}}</label>
                                    <input required type="password" class="form-control" id="password" name="password" value="{{ old('password') }}">
                                    @error('password')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="name_en" class="form-label">{{trans('teachers.name_en')}}</label>
                                    <input required type="text" class="form-control" id="name_en" name="name_en" value="{{ old('name_en') }}">
                                    @error('name_en')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="name_ar" class="form-label">{{trans('teachers.name_ar')}}</label>
                                    <input required type="text" class="form-control" id="name_ar" name="name_ar" value="{{ old('name_ar') }}">
                                    @error('name_ar')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="spec" class="form-label">{{trans('teachers.spec')}}</label>
                                    <div class="box">
                                        <select required class="fancyselect" name="spec">
                                            <option disabled selected>{{trans('teachers.chooseSpec')}}</option>
                                            @foreach($specs as $spec)
                                                <option value="{{$spec->id}}">{{$spec->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <br>
                                    <br>
                                    @error('spec')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="gender" class="form-label">{{trans('teachers.gender')}}</label>
                                    <div class="box">
                                        <select required class="fancyselect" name="gender">
                                            <option disabled selected>{{trans('teachers.chooseGender')}}</option>
                                            @foreach($genders as $gender)
                                                <option value="{{$gender->id}}">{{$gender->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <br>
                                @error('gender')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="joining_date" class="form-label">{{trans('teachers.join')}}</label>
                                    <input required type="date" class="form-control" id="joining_date" name="join" value="{{ old('joining_date') }}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <br>
                                <div class="mb-3">
                                    <label for="address" class="form-label">{{trans('teachers.address')}}</label>
                                    <textarea required class="form-control" id="address" name="address">{{ old('address') }}</textarea>
                                    @error('address')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        @error('error')
                        <br>
                        <div class="alert alert-danger">{{ $message }}</div>
                        <br>
                        @enderror
                        <button type="submit" class="btn btn-primary">{{trans('teachers.add')}}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
@endsection
@section('js')

@endsection
