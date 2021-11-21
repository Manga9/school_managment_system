<?php

namespace App\Http\Controllers;

use App\Models\FundAccount;
use App\Models\Payment;
use App\Models\Student;
use App\Models\StudentAccount;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{
    public function index()
    {
        $payments = Payment::all();
        return view('fees.payments.index', compact('payments'));
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $payment = Payment::create([
                'date' => date('y-m-d'),
                'student_id' => $request->student_id,
                'amount' => $request->debit,
                'description' => $request->description,
            ]);

            FundAccount::create([
                'date' => date('y-m-d'),
                'payment_id' => $payment->id,
                'debit' => 0.00,
                'credit' => $request->debit,
                'description' => $request->description,
            ]);

            StudentAccount::create([
                'date' => date('y-m-d'),
                'invoiceType' => 'payment',
                'student_id' => $request->student_id,
                'payment_id' => $payment->id,
                'debit' => $request->debit,
                'credit' => 0.00,
                'description' => $request->description,
            ]);
            
            DB::commit();

            toastr()->success(trans('messages.success'));
            return redirect()->route('payment.index');
        } catch (Exception $e) {
            DB::rollBack();
            return $e->getMessage();
        }
    }

    public function edit(Payment $payment)
    {
        $student = Student::where('id', $payment->student_id)->first();
        return view('fees.payments.edit', compact('payment', 'student'));
    }

    public function update(Request $request, Payment $payment)
    {
        DB::beginTransaction();
        try {
            $payment->update([
                'date' => date('y-m-d'),
                'student_id' => $request->student_id,
                'amount' => $request->debit,
                'description' => $request->description,
            ]);

            $fundAccount = FundAccount::where('payment_id', $payment->id)->first();
            $fundAccount->update([
                'date' => date('y-m-d'),
                'payment_id' => $payment->id,
                'debit' => 0.00,
                'credit' => $request->debit,
                'description' => $request->description,
            ]);

            $studentAccount = StudentAccount::where('payment_id', $payment->id)->first();
            $studentAccount->update([
                'date' => date('y-m-d'),
                'invoiceType' => 'payment',
                'student_id' => $request->student_id,
                'payment_id' => $payment->id,
                'debit' => $request->debit,
                'credit' => 0.00,
                'description' => $request->description,
            ]);
            
            DB::commit();

            toastr()->success(trans('messages.update'));
            return redirect()->route('payment.index');
        } catch (Exception $e) {
            DB::rollBack();
            return $e->getMessage();
        }
    }

    public function destroy(Payment $payment)
    {
        try {
            $payment->delete();
            toastr()->success(trans('messages.delete'));
            return redirect()->route('payment.index');
        } catch(Exception $e) {
            return $e->getMessage();
        }
    }

    public function addPayment($id) {
        $student = Student::findOrFail($id);
        return view('fees.payments.add', compact('student'));
    }
}
