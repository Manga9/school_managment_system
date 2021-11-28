<?php

namespace App\Http\Controllers;

use App\Http\Requests\subject\StoreSubjectRequest;
use App\Models\Classroom;
use App\Models\Grade;
use App\Models\Subject;
use App\Models\Teacher;
use Exception;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function index()
    {
        $subjects = Subject::all();
        return view('subjects.index', compact('subjects'));
    }

    public function create()
    {
        $grades = Grade::all();
        $teachers = Teacher::all();
        return view('subjects.create', compact('grades', 'teachers'));
    }

    public function store(StoreSubjectRequest $request)
    {
        try {
            Subject::create([
                'name' => ['en' => $request->name_en, 'ar' => $request->name_ar],
                'grade_id' => $request->grade_id,
                'classroom_id' => $request->classroom_id,
                'teacher_id' => $request->teacher_id,
            ]);

            toastr()->success(trans('messages.success'));
            return redirect(route('subjects.index'));

        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function edit(Subject $subject)
    {
        $grades = Grade::all();
        $classrooms = Classroom::where('grade_id', $subject->grade_id)->get();
        $teachers = Teacher::all();
        return view('subjects.edit', compact('subject', 'classrooms', 'grades', 'teachers'));
    }

    public function update(StoreSubjectRequest $request, Subject $subject)
    {
        try {
            $subject->update([
                'name' => ['en' => $request->name_en, 'ar' => $request->name_ar],
                'grade_id' => $request->grade_id,
                'classroom_id' => $request->classroom_id,
                'teacher_id' => $request->teacher_id,
            ]);

            toastr()->success(trans('messages.update'));
            return redirect(route('subjects.index'));

        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function destroy(Subject $subject)
    {
        try {
            $subject->delete();
            toastr()->success(trans('messages.delete'));
            return redirect(route('subjects.index'));

        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}
