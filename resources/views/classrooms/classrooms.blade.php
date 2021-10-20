@extends('layouts.master')
@section('css')

@section('title')
{{trans('classrooms.classrooms')}}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0">{{trans('classrooms.classrooms')}}
                </h4>
                <br>
                <a href="{{route('classrooms.create')}}"><button class="btn btn-primary btn-sm"><i class="ti-plus"></i> {{trans('classrooms.add')}}</button></a>
                <button id="delete_all_btn" class="btn btn-danger btn-sm"><i class="ti-trash"></i> {{trans('main.delete-all')}}</button>
                <br>
                <br>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}" class="default-color">{{trans('main.home')}}</a></li>
                    <li class="breadcrumb-item active">{{trans('classrooms.classrooms')}}</li>
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
                                <th>
                                    <input type="checkbox" id="check_all" name="boxes" onclick="CheckAll('box', this)">
                                </th>
                                <th>#</th>
                                <th>{{trans('main.name')}}</th>
                                <th>{{trans('grades.grade')}}</th>
                                <th>{{trans('main.controls')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i = 0 ?>
                            @foreach($classrooms as $classroom)
                                <?php $i++ ?>
                                <tr>
                                <td>
                                    <input type="checkbox" value="{{$classroom->id}}" name="box" class="box">
                                </td>
                                <td>{{$i}}</td>
                                <td>{{$classroom->name}}</td>
                                <td>{{$classroom->grade->name}}</td>
                                <td>
                                    <a href="{{route('classrooms.edit', $classroom->id)}}"><button class="btn btn-success btn-sm"><i class="ti-pencil"></i> {{trans('main.edit')}}</button></a>
                                    <form method="Post" action="{{route('classrooms.destroy', $classroom->id)}}" style="display: inline;">
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
                                <th>
                                    <input type="checkbox" id="check_all" name="boxes" onclick="CheckAll('box', this)">
                                </th>
                                <th>#</th>
                                <th>{{trans('main.name')}}</th>
                                <th>{{trans('grades.grade')}}</th>
                                <th>{{trans('main.controls')}}</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->

    <!-- Delete Selected Rows -->
    <div class="modal fade" id="delete_all" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                        {{ trans('main.delete') }}
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="{{ route('classrooms.delete_all') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        {{ trans('messages.confirm') }}
                        <input class="text" type="hidden" id="delete_all_id" name="delete_all_id" value=''>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                                data-dismiss="modal">{{ trans('main.close') }}</button>
                        <button type="submit" class="btn btn-danger">{{ trans('main.delete') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
@section('js')

@endsection
