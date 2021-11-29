@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{trans('question.edit')}}
@stop
@endsection
@section('page-header')
@section('PageTitle')
    {{trans('question.edit')}}
@stop
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="col-xs-12">
                        <div class="col-md-12">
                            <br>
                            <form action="{{ route('questions.update', $question->id) }}" method="post" autocomplete="off">
                                @csrf
                                {{method_field('PUT')}}
                                <div class="form-row">
                                    <div class="col">
                                        <label for="title">{{trans('question.name')}}</label>
                                        <input type="text" name="title" id="input-name" value="{{$question->title}}"
                                               class="form-control form-control-alternative" autofocus>
                                    </div>
                                </div>
                                <br>

                                <div class="form-row">
                                    <div class="col">
                                        <label for="title">{{trans('question.answers')}}</label>
                                        <textarea name="answers" class="form-control" id="exampleFormControlTextarea1"
                                        rows="4">{{$question->answers}}</textarea>
                                    </div>
                                </div>
                                <br>

                                <div class="form-row">
                                    <div class="col">
                                        <label for="title">{{trans('question.right')}}</label>
                                        <input type="text" name="right_answer" id="input-name" value="{{$question->right_answer}}"
                                               class="form-control form-control-alternative" autofocus>
                                    </div>
                                </div>
                                <br>

                                <div class="form-row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="exam_id">{{trans('question.exam-name')}} <span
                                                    class="text-danger">*</span></label>
                                            <select class="custom-select mr-sm-2" name="exam_id">
                                                <option selected disabled>{{trans('main.choose')}}</option>
                                                @foreach($exams as $exam)
                                                    <option
                                                    @if($exam->id == $question->exam_id) selected @endif
                                                    value="{{ $exam->id }}">{{ $exam->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="Grade_id">{{trans('question.degree')}} <span class="text-danger">*</span></label>
                                            <select class="custom-select mr-sm-2" name="score">
                                                <option selected disabled>{{trans('main.choose')}}</option>
                                                <option @if($question->score == 5) selected @endif value="5">5</option>
                                                <option @if($question->score == 10) selected @endif value="10">10</option>
                                                <option @if($question->score == 15) selected @endif value="15">15</option>
                                                <option @if($question->score == 20) selected @endif value="20">20</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit">{{trans('main.save')}}</button>
                            </form>
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