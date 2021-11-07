<?php

namespace App\Http\Controllers;

use App\Http\Requests\student\StoreGraduatedStore;
use App\Models\Grade;
use App\Models\Student;
use Illuminate\Http\Request;

class GraduatedController extends Controller
{
    public function index()
    {
        $students = Student::onlyTrashed()->get();
        return view('students.graduates.graduates', compact('students'));
    }

    public function create()
    {
        $grades = Grade::all();
        return view('students.graduates.create', compact('grades'));
    }

    public function store(StoreGraduatedStore $request)
    {
        try {
            $students = Student::where('grade_id', $request->grade_id)->where('classroom_id', $request->classroom_id)->where('section_id', $request->section_id)->get();
            foreach($students as $student)
            {
                $student->delete();
                toastr()->success(trans('messages.success'));
                return redirect(route('graduates.index'));
            }
        } catch(\Exception $e) {
            return $e->getMessage();
        }
    }

    public function show($id) {}

//    public function retrieve($id)
//    {
//
//
//    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        try {
            $student = Student::onlyTrashed()->where('id', $id)->first()->restore();

            toastr()->success(trans('messages.success'));
            return redirect(route('graduates.index'));
        } catch (\Exception $e)
        {
            return $e->getMessage();
        }
    }

    public function destroy($id)
    {
        Student::onlyTrashed()->where('id', $id)->first()->forceDelete();
        toastr()->success(trans('messages.delete'));
        return redirect(route('graduates.index'));
    }
}
