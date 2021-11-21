@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{trans('students.students-list')}}
@stop
@endsection
@section('page-header')
@section('PageTitle')
    {{trans('students.students-list')}}
@stop
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="col-xl-12 mb-30">
                        <div class="card card-statistics h-100">
                            <div class="card-body">
                                <a href="{{route('students.create')}}" class="btn btn-success btn-sm" role="button"
                                   aria-pressed="true">{{trans('students.add')}}</a><br><br>
                                <div class="table-responsive">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                           data-page-length="50"
                                           style="text-align: center">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>{{trans('main.name')}}</th>
                                            <th>{{trans('main.email')}}</th>
                                            <th>{{trans('students.gender')}}</th>
                                            <th>{{trans('students.grade')}}</th>
                                            <th>{{trans('students.classroom')}}</th>
                                            <th>{{trans('students.section')}}</th>
                                            <th>{{trans('students.birth')}}</th>
                                            <th>{{trans('students.blood')}}</th>
                                            <th>{{trans('students.nationality')}}</th>
                                            <th>{{trans('students.parent')}}</th>
                                            <th>{{trans('students.academic_year')}}</th>
                                            <th>{{trans('main.controls')}}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($students as $student)
                                            <tr>
                                                <td>{{ $loop->index+1 }}</td>
                                                <td>{{$student->name}}</td>
                                                <td>{{$student->email}}</td>
                                                <td>{{$student->gender->name}}</td>
                                                <td>{{$student->grade->name}}</td>
                                                <td>{{$student->classroom->name}}</td>
                                                <td>{{$student->section->name}}</td>
                                                <td>{{$student->date_birth}}</td>
                                                <td>{{$student->blood->name}}</td>
                                                <td>{{$student->nationality->name}}</td>
                                                <td>{{$student->myParent->father_name}}</td>
                                                <td>{{$student->academic_year}}</td>
                                                <td>
                                                    <button class="btn btn-primary btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                                                        {{trans('main.controls')}}
                                                    </button>
                                                    <ul class="dropdown-menu" style="padding: 15px;">
                                                        <li>
                                                            <a href="{{route('students.edit',$student->id)}}"><i class="fa fa-edit"></i> {{trans('students.edit')}}</a>
                                                        </li>
                                                        <li>
                                                            <form method="Post" action="{{route('students.destroy', $student->id)}}" style="display: inline;">
                                                                @csrf
                                                                {{method_field('DELETE')}}
                                                                <a type="submit" onclick="return confirm('{{trans("messages.confirm")}}')" style="cursor: pointer"><i class="ti-trash"></i> {{trans('main.delete')}}</a>
                                                            </form>
                                                        </li>
                                                        <li>
                                                            <a href="{{route('feeInvoices.addFee',$student->id)}}"><i class="fa fa-money"></i> {{trans('students.addInvoice')}}</a>
                                                        </li>
                                                        <li>
                                                            <a href="{{route('receiptStudents.addReceipt',$student->id)}}"><i class="fa fa-money"></i> {{trans('students.addCatchReceipt')}}</a>
                                                        </li>
                                                        <li>
                                                            <a href="{{route('processingFees.addProcessingFee',$student->id)}}"><i class="fa fa-money"></i> {{trans('students.processingFee')}}</a>
                                                        </li>
                                                        <li>
                                                            <a href="{{route('payment.addPayment',$student->id)}}"><i class="fa fa-money"></i> {{trans('students.payment')}}</a>
                                                        </li>
                                                        <li>
                                                            <a href="{{route('students.show', $student->id)}}"><i class="fa fa-eye"></i> {{trans('students.show')}}</a>
                                                        </li>
                                                    </ul>
                                                </div>
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
