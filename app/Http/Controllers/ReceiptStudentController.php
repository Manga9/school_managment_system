<?php

namespace App\Http\Controllers;

use App\Models\FundAccount;
use App\Models\ReceiptStudent;
use App\Models\Student;
use App\Models\StudentAccount;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReceiptStudentController extends Controller
{
    public function index()
    {
        $receipts = ReceiptStudent::all();
        return view('fees.receipts.receipts', compact('receipts'));
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $receipt = ReceiptStudent::create([
                'date' => date('y-m-d'),
                'student_id' => $request->student_id,
                'debit' => $request->debit,
                'description' => $request->description
            ]);

            FundAccount::create([
                'date' => date('y-m-d'),
                'receipt_id' => $receipt->id,
                'debit' => $request->debit,
                'credit' => 0.00,
                'description' => $request->description,
            ]);

            StudentAccount::create([
                'invoiceType' => 'receipt',
                'date' => date('y-m-d'),
                'receipt_id' => $receipt->id,
                'student_id' => $request->student_id,
                'debit' => 0.00,
                'credit' => $request->debit,
                'description' => $request->description,
            ]);
            DB::commit();
            toastr()->success(trans('messages.success'));
            return redirect(route('receiptStudents.index'));
        } catch (Exception $e) {
            DB::rollBack();
            return $e->getMessage();
        }
    }

    public function edit(ReceiptStudent $receiptStudent)
    {
        return view('fees.receipts.edit', compact('receiptStudent'));
    }

    public function update(Request $request, ReceiptStudent $receiptStudent)
    {
        DB::beginTransaction();
        try {
            $receiptStudent->update([
                'date' => date('y-m-d'),
                'student_id' => $request->student_id,
                'debit' => $request->debit,
                'description' => $request->description
            ]);

            $fundAccount = FundAccount::where('receipt_id', $receiptStudent->id)->first();
            $fundAccount->update([
                'date' => date('y-m-d'),
                'receipt_id' => $receiptStudent->id,
                'debit' => $request->debit,
                'credit' => 0.00,
                'description' => $request->description,
            ]);

            $studentAccount = StudentAccount::where('receipt_id', $receiptStudent->id)->first();
            $studentAccount->update([
                'invoiceType' => 'receipt',
                'date' => date('y-m-d'),
                'receipt_id' => $receiptStudent->id,
                'student_id' => $request->student_id,
                'debit' => 0.00,
                'credit' => $request->debit,
                'description' => $request->description,
            ]);
            DB::commit();
            toastr()->success(trans('messages.update'));
            return redirect(route('receiptStudents.index'));
        } catch (Exception $e) {
            DB::rollBack();
            return $e->getMessage();
        }
    }

    public function destroy(ReceiptStudent $receiptStudent)
    {
        try {
            $receiptStudent->delete();
            toastr()->success(trans('messages.delete'));
            return redirect(route('receiptStudents.index'));
        } catch(Exception $e) {
            return $e->getMessage();
        }
    }

    public function addReceipt($id) {
        $student = Student::findOrFail($id);
        return view('fees.receipts.add', compact('student'));
    }
}
