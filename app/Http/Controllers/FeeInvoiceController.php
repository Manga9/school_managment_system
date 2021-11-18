<?php

namespace App\Http\Controllers;

use App\Http\Requests\feeInvoice\StoreFeeInvoiceRequest;
use App\Models\Fee;
use App\Models\FeeInvoice;
use App\Models\Student;
use App\Models\StudentAccount;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FeeInvoiceController extends Controller
{
    public function index()
    {
        $feeInvoices = FeeInvoice::all();
        return view('fees.feeInvoices.index', compact('feeInvoices'));
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $invoices = $request->List_Fees;
            foreach($invoices as $invoice) {
               $feeInvoice = FeeInvoice::create([
                    'invoice_date' => date('y-m-d'),
                    'student_id' => $invoice['student_id'],
                    'grade_id' => $request->grade_id,
                    'classroom_id' => $request->classroom_id,
                    'fee_id' => $invoice['fee_id'],
                    'amount' => $invoice['amount'],
                    'description' => $invoice['description'],
                ]);

                StudentAccount::create([
                    'invoiceType' => 'invoice',
                    'date' => date('y-m-d'),
                    'fee_invoice_id' => $feeInvoice->id,
                    'student_id' => $invoice['student_id'],
                    'debit' => $invoice['amount'],
                    'credit' => 0.00,
                    'description' => $invoice['description']
                ]);
            }
            DB::commit();
            toastr()->success(trans('messages.success'));
            return redirect(route('feeInvoices.index'));
        } catch(Exception $e) {
            DB::rollBack();
            return $e->getMessage();
        }
    }

    public function edit(FeeInvoice $feeInvoice)
    {
        $student = Student::findOrFail($feeInvoice->student_id);
        $fees = Fee::where('classroom_id', $student->classroom_id)->get();
        return view('fees.feeInvoices.edit', compact('feeInvoice', 'student', 'fees'));
    }

    public function update(Request $request, FeeInvoice $feeInvoice)
    {
        try {
            $feeInvoice->update([
                'invoice_date' => date('y-m-d'),
                'student_id' => $request->student_id,
                'grade_id' => $request->grade_id,
                'classroom_id' => $request->classroom_id,
                'fee_id' => $request->fee_id,
                'amount' => $request->amount,
                'description' => $request->description,
            ]);
            toastr()->success(trans('messages.update'));
            return redirect(route('feeInvoices.index'));
        } catch(Exception $e) {
            return $e->getMessage();
        }
    }

    public function destroy(FeeInvoice $feeInvoice)
    {
        try {
            $feeInvoice->delete();
            toastr()->success(trans('messages.delete'));
            return redirect(route('feeInvoices.index'));
        } catch(Exception $e) {
            return $e->getMessage();
        }
    }

    public function addFee($id) {
        $student = Student::findOrFail($id);
        $fees = Fee::where('classroom_id', $student->classroom_id)->get();
        return view('fees.feeInvoices.addFee', compact('student', 'fees'));
    }
}
