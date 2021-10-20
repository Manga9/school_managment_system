<?php

namespace App\Http\Controllers;

use App\Http\Requests\section\StoreSectionRequest;
use App\Models\Classroom;
use App\Models\Grade;
use App\Models\Section;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $grades = Grade::with(['sections'])->get();
        return view('sections.sections', compact('grades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $grades = Grade::select('name', 'id')->get();
        return view('sections.create', compact('grades'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSectionRequest $request)
    {
        try {
            Section::create([
                'name' => ['en' => $request->name_en, 'ar' => $request->name_ar],
                'grade_id' => $request->grade,
                'classroom_id' => $request->classroom,
            ]);
            toastr()->success(trans('messages.success'));
            return redirect(route('sections.index'));
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error', $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function show(Section $section)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function edit(Section $section)
    {
        $grades = Grade::select('name', 'id')->get();
        $classrooms = Classroom::select('name', 'id', 'grade_id')->get();
        return view('sections.edit', compact('section', 'grades', 'classrooms'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function update(StoreSectionRequest $request, Section $section)
    {
        try {
            if (isset($request->status)) {
                $status = 1;
            } else {
                $status = 0;
            }
            $section->update([
                'name' => ['en' => $request->name_en, 'ar' => $request->name_ar],
                'grade_id' => $request->grade,
                'classroom_id' => $request->classroom,
                'status' => $status,
            ]);
            toastr()->success(trans('messages.update'));
            return redirect(route('sections.index'));
        } catch(\Exception $e) {
            return redirect()->back()->withErrors(['error', $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function destroy(Section $section)
    {
        try {
            $section->delete();
            toastr()->success(trans('messages.delete'));
            return redirect(route('sections.index'));
        } catch(\Exception $e) {
            return redirect()->back()->withErrors(['error', $e->getMessage()]);
        }
    }

    public function getClasses($id)
    {
        $list_classes = Classroom::where("grade_id", $id)->pluck("name", "id");
        return $list_classes;
    }

    public function delete_all(Request $request) {
        $sections_id = explode(',', $request->delete_all_id);
        Section::whereIn('id', $sections_id)->delete();
        toastr()->success(trans('messages.delete'));
        return redirect()->route('sections.index');
    }
}
