@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{trans('students.editInvoice')}}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
{{trans('students.editInvoice')}} {{$student->name}}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
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

                        <form class=" row mb-30" action="{{ route('feeInvoices.update', $feeInvoice->id) }}" method="POST">
                            @csrf
                            {{method_field('PUT')}}
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <label for="Name" class="mr-sm-2">{{trans('students.name')}}</label>
                                        <select class="select form-control" name="student_id" required>
                                                <option value="{{ $student->id }}" selected>{{ $student->name }}</option>
                                        </select>
                                    </div>

                                    <div class="col">
                                        <label for="Name_en" class="mr-sm-2">{{trans('students.feeType')}}</label>
                                        <div class="box">
                                            <select class="select form-control" name="fee_id" required>
                                                <option value="">{{trans('main.choose')}}</option>
                                                @foreach($fees as $fee)
                                                    <option
                                                    @if($fee->id == $feeInvoice->fee_id) selected @endif 
                                                    value="{{ $fee->id }}">{{ $fee->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                    </div>

                                    <div class="col">
                                        <label for="Name_en" class="mr-sm-2">{{trans('fees.amount')}}</label>
                                        <div class="box">
                                            <select class="select form-control" name="amount" required>
                                                <option value="">{{trans('main.choose')}}</option>
                                                @foreach($fees as $fee)
                                                    <option
                                                    @if($fee->id == $feeInvoice->fee_id) selected @endif 
                                                    value="{{ $fee->amount }}">{{ $fee->amount }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col">
                                        <label for="description" class="mr-sm-2">{{trans('main.note')}}</label>
                                        <div class="box">
                                            <input type="text" class="form-control" name="description" value="{{$feeInvoice->description}}">
                                        </div>
                                    </div>
                                </div>
                                <br>
                        <input type="hidden" name="grade_id" value="{{$student->grade_id}}">
                        <input type="hidden" name="classroom_id" value="{{$student->classroom_id}}">

                        <button type="submit" class="btn btn-primary">{{trans('main.save')}}</button>
                            </div>
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