@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{trans('students.students-list')}}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    {{trans('students.students-list')}}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="col-xl-12 mb-30">
                        <div class="card card-statistics h-100">
                            <div class="card-body">
                                <form method="post" action="{{route('images.upload_images', $student->id)}}" enctype="multipart/form-data">
                                    @csrf
                                    <label>{{trans('main.attachFile')}}</label>
                                    <div class="form-group">
                                        <input type="file" name="photos[]" accept="image/*" multiple>
                                    </div>
                                    <button class="btn btn-outline-success btn-sm" type="submit">{{trans('main.save')}}</button>
                                </form>
                                <br>
                                <div class="table-responsive">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                           data-page-length="50"
                                           style="text-align: center">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>{{trans('main.name')}}</th>
                                            <th>{{trans('main.controls')}}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($student->images as $image)
                                            <tr>
                                                <td>{{ $loop->index+1 }}</td>
                                                <td>{{$image->name}}</td>
                                                <td>
                                                    <a href="{{url('/students/download')}}/{{$student->id}}/{{$image->name}}" class="btn btn-info btn-sm" role="button" aria-pressed="true"><i class="fa fa-download"></i></a>
                                                    <form method="Post" action="{{route('images.delete_image', [$student->id, $image->name, $image->id])}}" style="display: inline;" enctype="multipart/form-data">
                                                        @csrf
                                                        {{method_field('DELETE')}}
                                                        <button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('{{trans("messages.confirm")}}')"><i class="ti-trash"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
@endsection
@section('js')
    @toastr_js
    @toastr_render
@endsection
