<?php

namespace App\Repository\Teacher;

use App\Models\Gender;
use App\Models\Specialization;
use App\Models\Teacher;

class TeacherRepository implements TeacherRepositoryInterface {
    public function getAllTeachers()
    {
        return Teacher::all();
    }

    public function getAllSpecilaizations()
    {
        return Specialization::all();
    }

    public function getAllGenders()
    {
        return Gender::all();
    }

    public function storeTeacher($request)
    {
        try {
            Teacher::create([
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'name' => ['en' => $request->name_en, 'ar' => $request->name_ar],
                'specialization_id' => $request->spec,
                'gender_id' => $request->gender,
                'joining_date' => $request->join,
                'address' => $request->address
            ]);
            toastr()->success(trans('messages.success'));
            return redirect(route('teachers.index'));
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function editTeacher($id)
    {
        return Teacher::findOrFail($id);
    }

    public function updateTeacher($request, $id)
    {
        try {
            $teacher = Teacher::findOrFail($id);
            $teacher->update([
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'name' => ['en' => $request->name_en, 'ar' => $request->name_ar],
                'specialization_id' => $request->spec,
                'gender_id' => $request->gender,
                'joining_date' => $request->join,
                'address' => $request->address
            ]);
            toastr()->success(trans('messages.update'));
            return redirect(route('teachers.index'));
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function deleteTeacher($id)
    {
        try {
            Teacher::findOrFail($id)->delete();
            toastr()->success(trans('messages.delete'));
            return redirect(route('teachers.index'));
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
