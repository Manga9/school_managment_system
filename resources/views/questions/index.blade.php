@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{trans('question.questions-list')}}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    {{trans('question.questions-list')}}
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
                                <a href="{{route('questions.create')}}" class="btn btn-success btn-sm" role="button"
                                   aria-pressed="true">{{trans('question.add')}}</a><br><br>
                                <div class="table-responsive">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                           data-page-length="50"
                                           style="text-align: center">
                                        <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">{{trans('question.question')}}</th>
                                            <th scope="col">{{trans('question.answers')}}</th>
                                            <th scope="col">{{trans('question.right')}}</th>
                                            <th scope="col">{{trans('question.degree')}}</th>
                                            <th scope="col">{{trans('question.exam-name')}}</th>
                                            <th scope="col">{{trans('main.controls')}}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($questions as $question)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$question->title}}</td>
                                                <td>{{$question->answers}}</td>
                                                <td>{{$question->right_answer}}</td>
                                                <td>{{$question->score}}</td>
                                                <td>{{$question->exam->name}}</td>
                                                <td>
                                                    <a href="{{route('questions.edit',$question->id)}}"
                                                    class="btn btn-info btn-sm" role="button" aria-pressed="true"><i
                                                        class="fa fa-edit"></i></a>
                                                    <form method="Post" action="{{route('questions.destroy', $question->id)}}" style="display: inline;">
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