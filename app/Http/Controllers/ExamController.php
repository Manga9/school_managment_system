<?php

namespace App\Http\Controllers;

use App\Http\Requests\exam\StoreExamRequest;
use App\Models\Classroom;
use App\Models\Exam;
use App\Models\Grade;
use App\Models\Subject;
use App\Models\Teacher;
use Exception;

class ExamController extends Controller
{
    public function index()
    {
        $exams = Exam::all();
        return view('exams.index', compact('exams'));
    }

    public function create()
    {
        $grades = Grade::all();
        $subjects = Subject::all();
        $teachers = Teacher::all();
        return view('exams.create', compact('grades', 'subjects', 'teachers'));
    }

    public function store(StoreExamRequest $request)
    {
        try {
            Exam::create([
                'name' => ['en' => $request->name_en, 'ar' => $request->name_ar],
                'term' => $request->term,
                'grade_id' => $request->grade_id,
                'classroom_id' => $request->classroom_id,
                'subject_id' => $request->subject_id,
                'teacher_id' => $request->teacher_id,
                'academic_year' => $request->academic_year
            ]);

            toastr()->success(trans('messages.success'));
            return redirect(route('exams.index'));

        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function edit(Exam $exam)
    {
        $grades = Grade::all();
        $classrooms = Classroom::where('grade_id', $exam->grade_id)->get();
        $subjects = Subject::where('classroom_id', $exam->classroom_id)->get();
        $teachers = Teacher::all();
        return view('exams.edit', compact('exam', 'grades', 'classrooms', 'subjects', 'teachers'));
    }

    public function update(StoreExamRequest $request, Exam $exam)
    {
        try {
            $exam->update([
                'name' => ['en' => $request->name_en, 'ar' => $request->name_ar],
                'term' => $request->term,
                'grade_id' => $request->grade_id,
                'classroom_id' => $request->classroom_id,
                'subject_id' => $request->subject_id,
                'teacher_id' => $request->teacher_id,
                'academic_year' => $request->academic_year
            ]);

            toastr()->success(trans('messages.update'));
            return redirect(route('exams.index'));

        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function destroy(Exam $exam)
    {
        try {
            $exam->delete();
            toastr()->success(trans('messages.delete'));
            return redirect(route('exams.index'));
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function getSubjects($id) {
        $subjects = Subject::where('classroom_id', $id)->pluck('name', 'id');
        return $subjects;
    }
}
