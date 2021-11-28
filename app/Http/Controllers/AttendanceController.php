<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Grade;
use App\Models\Student;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function index()
    {
        $grades = Grade::all();
        return view('attendance.index', compact('grades'));
    }

    public function show($id)
    {
        $students = Student::with('attendance')->where('section_id',$id)->get();
        if (count($students) < 1) {
            toastr()->error('There is no student in this section');
            return redirect(route('attendance.index'));
        }
        return view('attendance.show', compact('students'));
    }

    public function store(Request $request)
    {
        try {

            foreach ($request->attendences as $studentId => $attendence) {


                Attendance::create([
                    'student_id'=> $studentId,
                    'grade_id'=> $request->grade_id,
                    'classroom_id'=> $request->classroom_id,
                    'section_id'=> $request->section_id,
                    'teacher_id'=> 1,
                    'attendence_date'=> date('y-m-d'),
                    'attendence_status'=> $attendence
                ]);
            }

            toastr()->success(trans('messages.success'));
            return redirect()->back();
        } catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function edit(Attendance $attendance)
    {
        //
    }

    public function update(Request $request, Attendance $attendance)
    {
        //
    }

    public function destroy(Attendance $attendance)
    {
        //
    }
}
