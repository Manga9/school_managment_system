<?php

namespace App\Http\Controllers;

use App\Http\Requests\grade\StoreGradeRequest;
use App\Http\Requests\grade\updateGradeRequest;
use App\Models\Classroom;
use App\Models\Grade;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $grades = Grade::all();
        return view('grades.grades', compact('grades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('grades.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGradeRequest $request)
    {
        try {
            $grade = new Grade();
            $grade->name = ['en' => $request->name_en, 'ar' => $request->name_ar];
            $grade->note = ['en' => $request->note_en, 'ar' => $request->note_ar];
            $grade->save();
            toastr()->success(trans('messages.success'));
            return redirect(route('grades.index'));
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Grade $grade
     * @return \Illuminate\Http\Response
     */
    public function show(Grade $grade)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Grade $grade
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $grade = Grade::find($id);
        return view('grades.edit', compact('grade'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Grade $grade
     * @return \Illuminate\Http\Response
     */
    public function update(updateGradeRequest $request, $id)
    {
        try {
            $grade = Grade::findOrFail($id);
            $grade->name = ['en' => $request->name_en, 'ar' => $request->name_ar];
            $grade->note = ['en' => $request->note_en, 'ar' => $request->note_ar];
            $grade->save();
            toastr()->success(trans('messages.update'));
            return redirect(route('grades.index'));
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Grade $grade
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $classroomID = Classroom::where('grade_id', $id)->pluck('grade_id');
            if ($classroomID->count() == 0) {
                $grade = Grade::find($id);
                $grade->delete();
                toastr()->success(trans('messages.delete'));
                return redirect(route('grades.index'));
            } else {
                toastr()->error(trans('grades.deleteGrade'));
                return redirect(route('grades.index'));
            }

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function delete_all(Request $request) {
        $grades_id = explode(',', $request->delete_all_id);
        $classroomID = Classroom::whereIn('grade_id', $grades_id)->pluck('grade_id');
        if ($classroomID->count() == 0) {
            Grade::whereIn('id', $grades_id)->delete();
            toastr()->success(trans('messages.delete'));
            return redirect()->route('grades.index');
        } else {
            toastr()->error(trans('grades.deleteGrade'));
            return redirect(route('grades.index'));
        }
    }
}
