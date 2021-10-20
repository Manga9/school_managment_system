<?php

namespace App\Http\Controllers;

use App\Http\Requests\classroom\StoreClassroomRequest;
use App\Http\Requests\classroom\UpdateClassroomRequest;
use App\Models\Classroom;
use App\Models\Grade;
use Illuminate\Http\Request;

class ClassroomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $classrooms = Classroom::all();
        return view('classrooms.classrooms', compact('classrooms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $grades = Grade::all();
        return view('classrooms.create', compact('grades'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreClassroomRequest $request)
    {
        try {
            $listClasses = $request->List_Classes;
            foreach($listClasses as $listClass) {
                Classroom::create([
                    'name' => ['en' => $listClass['name_en'], 'ar' => $listClass['name_ar']],
                    'grade_id' => $listClass['grade'],
                ]);

//                if(!$class->save()) throwException('error');
            }
            toastr()->success(trans('messages.success'));
            return redirect(route('classrooms.index'));
        } catch (\Exception $e)
        {
            return redirect()->back()->withErrors('Something Error Please Try Again');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Classroom  $classroom
     * @return \Illuminate\Http\Response
     */
    public function show(Classroom $classroom)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Classroom  $classroom
     * @return \Illuminate\Http\Response
     */
    public function edit(Classroom $classroom)
    {
        $grades = Grade::all();
        return view('classrooms.edit', compact('classroom', 'grades'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Classroom  $classroom
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateClassroomRequest $request, Classroom $classroom)
    {
        try {
            $classroom->update([
                'name' => ['en' => $request->name_en, 'ar' => $request->name_ar],
                'grade_id' => $request->grade,
            ]);
            toastr()->success(trans('messages.update'));
            return redirect(route('classrooms.index'));
        } catch (\Exception $e)
        {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Classroom  $classroom
     * @return \Illuminate\Http\Response
     */
    public function destroy(Classroom $classroom)
    {
        try {
            $classroom->delete();
            toastr()->success(trans('messages.delete'));
            return redirect(route('classrooms.index'));
        }  catch (\Exception $e)
        {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function delete_all(Request $request) {
        $classrooms_id = explode(',', $request->delete_all_id);
            Classroom::whereIn('id', $classrooms_id)->delete();
            toastr()->success(trans('messages.delete'));
            return redirect()->route('classrooms.index');
    }
}
