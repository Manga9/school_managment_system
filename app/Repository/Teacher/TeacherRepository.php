<?php

namespace App\Repository\Teacher;

use App\Models\Gender;
use App\Models\Specialization;
use App\Models\Teacher;
use App\Repository\MainRepositoryInterface;

class TeacherRepository implements MainRepositoryInterface {
    public function getAllItems()
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

    public function storeItem($request)
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

    public function editItem($id)
    {
        return Teacher::findOrFail($id);
    }

    public function updateItem($request, $id)
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

    public function deleteItem($id)
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
