<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\ProcessingFee;
use App\Models\StudentAccount;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProcessingFeeController extends Controller
{
    public function index()
    {
        $processingFees = ProcessingFee::all();
        return view('fees.processingFees.index', compact('processingFees'));
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $proccessing = ProcessingFee::create([
                'date' => date('y-m-d'),
                'student_id' => $request->student_id,
                'amount' => $request->debit,
                'description' => $request->description,
            ]);

            StudentAccount::create([
                'date' => date('y-m-d'),
                'invoiceType' => 'Processing Fee',
                'student_id' => $request->student_id,
                'processing_id' => $proccessing->id,
                'debit' => 0.00,
                'credit' => $request->debit,
                'description' => $request->description,
            ]);

            DB::commit();
            toastr()->success(trans('messages.success'));
            return redirect()->route('processingFees.index');
        } catch (Exception $e) {
            DB::rollBack();
            return $e->getMessage();
        }
    }

    public function edit(ProcessingFee $processingFee)
    {
        $student = Student::where('id', $processingFee->student_id)->first();
        return view('fees.processingFees.edit', compact('processingFee', 'student'));
    }

    public function update(Request $request, ProcessingFee $processingFee)
    {
        DB::beginTransaction();
        try {
            $processingFee->update([
                'date' => date('y-m-d'),
                'student_id' => $request->student_id,
                'amount' => $request->debit,
                'description' => $request->description,
            ]);

            $studentAccount = StudentAccount::where('processing_id', $processingFee->id)->first();
            $studentAccount->update([
                'date' => date('y-m-d'),
                'invoiceType' => 'Processing Fee',
                'student_id' => $request->student_id,
                'processing_id' => $processingFee->id,
                'debit' => 0.00,
                'credit' => $request->debit,
                'description' => $request->description,
            ]);

            DB::commit();
            toastr()->success(trans('messages.delete'));
            return redirect()->route('processingFees.index');
        } catch (Exception $e) {
            DB::rollBack();
            return $e->getMessage();
        }
    }

    public function destroy(ProcessingFee $processingFee)
    {
        try {
            $processingFee->delete();
            toastr()->success(trans('messages.delete'));
            return redirect()->route('processingFees.index');
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function addProcessingFee($id) {
        $student = Student::findOrFail($id);
        return view('fees.processingFees.add', compact('student'));
    }
}
