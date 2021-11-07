@extends('layouts.master')
@section('css')

@section('title')
{{trans('teachers.teachers')}}
@stop

@endsection

@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0">{{trans('teachers.teachers')}}</h4>
                <br>
                <a href="{{route('teachers.create')}}"><button class="btn btn-primary btn-sm"><i class="ti-plus"></i> {{trans('teachers.add')}}</button></a>
                <br>
                <br>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}" class="default-color">Home</a></li>
                    <li class="breadcrumb-item active">{{trans('teachers.teachers')}}</li>
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
                    <div class="table-responsive">
                        <table id="datatable" class="table table-striped table-bordered p-0">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>{{trans('main.email')}}</th>
                                <th>{{trans('main.name')}}</th>
                                <th>{{trans('teachers.spec')}}</th>
                                <th>{{trans('teachers.gender')}}</th>
                                <th>{{trans('teachers.join')}}</th>
                                <th>{{trans('teachers.address')}}</th>
                                <th>{{trans('main.controls')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i = 0 ?>
                            @foreach($teachers as $teacher)
                                <?php $i++ ?>
                                <tr>
                                <td>{{$i}}</td>
                                <td>{{$teacher->email}}</td>
                                <td>{{$teacher->name}}</td>
                                <td>{{$teacher->specialization_id}}</td>
                                <td>{{$teacher->gender->name}}</td>
                                <td>{{$teacher->joining_date}}</td>
                                <td>{{$teacher->address}}</td>
                                    <td>
                                    <a href="{{route('teachers.edit', $teacher->id)}}"><button class="btn btn-success btn-sm"><i class="ti-pencil"></i> {{trans('main.edit')}}</button></a>
                                    <form method="Post" action="{{route('teachers.destroy', $teacher->id)}}" style="display: inline;">
                                     @csrf
                                        {{method_field('DELETE')}}
                                        <button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('{{trans("messages.confirm")}}')"><i class="ti-trash"></i> {{trans('main.delete')}}</button>
                                    </form>

                                </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>#</th>
                                <th>{{trans('main.email')}}</th>
                                <th>{{trans('main.name')}}</th>
                                <th>{{trans('teachers.spec')}}</th>
                                <th>{{trans('teachers.gender')}}</th>
                                <th>{{trans('teachers.join')}}</th>
                                <th>{{trans('teachers.address')}}</th>
                                <th>{{trans('main.controls')}}</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('js')
@endsection
