<?php

namespace App\Http\Controllers;

use App\Http\Requests\student\StorePromotionRequest;
use App\Models\Grade;
use App\Models\Promotion;
use App\Models\Student;
use Illuminate\Support\Facades\DB;

class PromotionController extends Controller
{
    public function index()
    {
        $promotions = Promotion::all();
        return view('students.promotions.promotions', compact('promotions'));
    }

    public function create()
    {
        $grades = Grade::all();
        return view('students.promotions.create', compact('grades'));
    }

    public function store(StorePromotionRequest $request)
    {
        DB::beginTransaction();
        try {
            $students = Student::where('grade_id', $request->grade_id)->where('classroom_id', $request->classroom_id)->where('section_id', $request->section_id)->where('academic_year', $request->academic_year)->get();

            if($students->count() < 1)
            {
                toastr()->error('There is no Students for promotions');
                return redirect(route('promotions.index'));
            }

            foreach($students as $student)
            {
                $student->Update([
                    'grade_id' => $request->grade_id_new,
                    'classroom_id' => $request->classroom_id_new,
                    'section_id' => $request->section_id_new,
                    'academic_year' => $request->new_academic_year
                ]);

                Promotion::updateOrCreate([
                    'student_id' => $student->id,
                    'from_grade_id' => $request->grade_id,
                    'from_classroom_id' => $request->classroom_id,
                    'from_section_id' => $request->section_id,
                    'to_grade_id' => $request->grade_id_new,
                    'to_classroom_id' => $request->classroom_id_new,
                    'to_section_id' => $request->section_id_new,
                    'old_academic' => $request->academic_year,
                    'new_academic' => $request->new_academic_year,
                ]);
            }
            DB::commit();
            toastr()->success(trans('messages.success'));
            return redirect(route('promotions.index'));
        } catch(\Exception $e)
        {
            return $e->getMessage();
        }
    }

    public function edit(Promotion $promotion)
    {
        $grades = Grade::all();
        return view('students.promotions.edit', compact('promotion', 'grades'));
    }

    public function update(StorePromotionRequest $request, Promotion $promotion)
    {
        DB::beginTransaction();
        try {
            $student = Student::findOrFail($promotion->student_id);
            $student->Update([
                'grade_id' => $request->grade_id_new,
                'classroom_id' => $request->classroom_id_new,
                'section_id' => $request->section_id_new,
                'academic_year' => $request->new_academic_year
            ]);

            Promotion::updateOrCreate([
                'student_id' => $student->id,
                'from_grade_id' => $request->grade_id,
                'from_classroom_id' => $request->classroom_id,
                'from_section_id' => $request->section_id,
                'to_grade_id' => $request->grade_id_new,
                'to_classroom_id' => $request->classroom_id_new,
                'to_section_id' => $request->section_id_new,
                'old_academic' => $request->academic_year,
                'new_academic' => $request->new_academic_year,
            ]);
            DB::commit();
            toastr()->success(trans('messages.update'));
            return redirect(route('promotions.index'));
        }catch(\Exception $e)
        {
            return $e->getMessage();
        }
    }
}
