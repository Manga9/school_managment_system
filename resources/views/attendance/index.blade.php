@extends('layouts.master')
@section('css')
@toastr_css
@section('title')
{{trans('attendance.attendance')}}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0">{{trans('attendance.attendance')}}
                </h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}" class="default-color">{{trans('main.home')}}</a></li>
                    <li class="breadcrumb-item active">{{trans('attendance.attendance')}}</li>
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
                    @error('error')
                    <br>
                    <div class="alert alert-danger">{{ $message }}</div>
                    <br>
                    @enderror
                    <div class="card card-statistics h-100">
                        <div class="card-body">
                            <h5 class="card-title">{{trans('sections.sections-list')}}</h5>
                            <div class="accordion">
                                @foreach($grades as $grade)
                                    <div class="acd-group">
                                        <p class="acd-heading">{{$grade->name}}</p>
                                        <div class="acd-des">
                                        <div class="table-responsive">
                                            <table id="datatable" class="table table-striped table-bordered p-0">
                                                <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>{{trans('main.name')}}</th>
                                                    <th>{{trans('classrooms.classroom')}}</th>
                                                    <th>{{trans('sections.status')}}</th>
                                                    <th>{{trans('main.controls')}}</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php $i = 0 ?>
                                                @foreach($grade->sections as $section)
                                                    <?php $i++ ?>
                                                    <tr>
                                                    <td>{{$i}}</td>
                                                    <td>{{$section->name}}</td>
                                                    <td>{{$section->classroom->name}}</td>
                                                    <td>
                                                        @if($section->status == 1)
                                                            <span class="badge bg-success" style="color: #fff">{{trans('sections.active')}}</span>
                                                        @else
                                                            <span class="badge bg-danger" style="color: #fff">{{trans('sections.disable')}}</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <a href="{{route('attendance.show', $section->id)}}"><button class="btn btn-success btn-sm">{{trans('students.list')}}</button></a>
                                                    </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                                <tfoot>
                                                <tr>
                                                    <th>#</th>
                                                    <th>{{trans('main.name')}}</th>
                                                    <th>{{trans('classrooms.classroom')}}</th>
                                                    <th>{{trans('sections.status')}}</th>
                                                    <th>{{trans('main.controls')}}</th>
                                                </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('js')
@toastr_js
@toastr_render
@endsection
