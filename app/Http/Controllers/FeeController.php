<?php

namespace App\Http\Controllers;

use App\Http\Requests\fees\StoreFeesRequest;
use App\Models\Classroom;
use App\Models\Fee;
use App\Models\Grade;
use Exception;
use Illuminate\Http\Request;

class FeeController extends Controller
{
    public function index()
    {
        $fees = Fee::all();
        return view('fees.fees', compact('fees'));
    }

    public function create()
    {
        $grades = Grade::all();
        return view('fees.create', compact('grades'));
    }

    public function store(StoreFeesRequest $request)
    {
        try {
            Fee::create([
                'title' => ['en' => $request->title_en, 'ar' => $request->title_ar],
                'amount' => $request->amount,
                'grade_id' => $request->grade_id,
                'classroom_id' => $request->classroom_id,
                'description' => $request->description,
                'year' => $request->year,
            ]);

            toastr()->success(trans('messages.success'));
            return redirect(route('fees.index'));

        } catch(Exception $e) {
            return $e->getMessage();
        }
    }

    // public function show(Fee $fee)
    // {
    //     //
    // }

    public function edit(Fee $fee)
    {
        $grades = Grade::all();
        $classrooms = Classroom::where('grade_id', $fee->grade_id)->get();
        return view('fees.edit', compact('fee', 'grades', 'classrooms'));
    }

    public function update(StoreFeesRequest $request, Fee $fee)
    {
        try {
            $fee->update([
                'title' => ['en' => $request->title_en, 'ar' => $request->title_ar],
                'amount' => $request->amount,
                'grade_id' => $request->grade_id,
                'classroom_id' => $request->classroom_id,
                'description' => $request->description,
                'year' => $request->year,
            ]);
            toastr()->success(trans('messages.update'));
            return redirect(route('fees.index'));

        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function destroy(Fee $fee)
    {
        try {
            $fee->delete();
            toastr()->success(trans('messages.delete'));
            return redirect(route('fees.index'));
        } catch(Exception $e) {
            return $e->getMessage();
        }
    }
}
