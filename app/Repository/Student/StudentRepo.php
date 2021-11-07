<?php

namespace App\Repository\Student;

use App\Models\Blood;
use App\Models\Classroom;
use App\Models\Gender;
use App\Models\Grade;
use App\Models\Image;
use App\Models\MyParent;
use App\Models\Nationality;
use App\Models\Section;
use App\Models\Student;
use App\Repository\MainRepositoryInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class StudentRepo implements MainRepositoryInterface
{
    public function getAllItems()
    {
        return Student::all();
    }

    public function getAllGenders()
    {
        return Gender::all();
    }

    public function createStudent()
    {
        $data['genders'] = Gender::all();
        $data['nationalities'] = Nationality::all();
        $data['bloods'] = Blood::all();
        $data['grades'] = Grade::all();
        $data['parents'] = MyParent::all();

        return view('students.create', $data);
    }

    public function storeItem($request)
    {
        DB::beginTransaction();

        try {
            $student = Student::create([
                'name' => ['en' => $request->name_en, 'ar' => $request->name_ar],
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'gender_id' => $request->gender_id,
                'nationality_id' => $request->nationality_id,
                'blood_type_id' => $request->blood_id,
                'date_birth' => $request->date_birth,
                'grade_id' => $request->grade_id,
                'classroom_id' => $request->classroom_id,
                'section_id' => $request->section_id,
                'parent_id' => $request->parent_id,
                'academic_year' => $request->academic_year,
            ]);

            if ($request->hasfile('photos'))
            {
                foreach($request->file('photos') as $photo)
                {
                    $photoName = date('YmdHis') . "." . $photo->getClientOriginalName();
                    $photo->storeAs('attachments/students/' . $student->id, $photoName, 'student_attachments');
                    Image::create([
                        'name' => $photoName,
                        'imageable_id' => $student->id,
                        'imageable_type' => 'App\Models\Student'
                    ]);
                }
            }

            DB::commit();
            toastr()->success(trans('messages.success'));
            return redirect(route('students.index'));

        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function editItem($id)
    {
        $data['student'] = Student::findOrFail($id);
        $data['genders'] = Gender::all();
        $data['nationalities'] = Nationality::all();
        $data['bloods'] = Blood::all();
        $data['grades'] = Grade::all();
        $data['parents'] = MyParent::all();
        $data['classrooms'] = Classroom::all();
        $data['sections'] = Section::all();

        return view('students.edit', $data);
    }

    public function updateItem($request, $id)
    {
        try {
            $student = Student::findOrFail($id);
            $student->update([
                'name' => ['en' => $request->name_en, 'ar' => $request->name_ar],
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'gender_id' => $request->gender_id,
                'nationality_id' => $request->nationality_id,
                'blood_type_id' => $request->blood_id,
                'date_birth' => $request->date_birth,
                'grade_id' => $request->grade_id,
                'classroom_id' => $request->classroom_id,
                'section_id' => $request->section_id,
                'parent_id' => $request->parent_id,
                'academic_year' => $request->academic_year,
            ]);
            toastr()->success(trans('messages.success'));
            return redirect(route('students.index'));
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function deleteItem($id)
    {
        $images = Image::where('imageable_id', $id)->get();
        if($images)
        {
            foreach($images as $image)
            {
                $filepath = '/attachments/students/'. $id;
                Storage::disk('student_attachments')->deleteDirectory($filepath);

                $image = Image::findOrFail($image->id);
                $image->delete();
            }
        }

        Student::findOrFail($id)->delete();
        toastr()->success(trans('messages.delete'));
        return redirect(route('students.index'));
    }

    public function getSections($id)
    {
        $sections = Section::where("classroom_id", $id)->pluck("name", "id");
        return $sections;
    }

    public function upload_images($request, $id)
    {
        if ($request->hasfile('photos'))
        {
            foreach($request->file('photos') as $photo)
            {
                $photoName = date('YmdHis') . "." . $photo->getClientOriginalName();
                $photo->storeAs('attachments/students/' . $id, $photoName, 'student_attachments');
                Image::create([
                    'name' => $photoName,
                    'imageable_id' => $id,
                    'imageable_type' => 'App\Models\Student'
                ]);
            }
            toastr()->success(trans('messages.success'));
            return redirect(route('students.show', $id));
        }
    }

    public function download_image($id, $name)
    {
        $filepath = public_path('/attachments/students/'. $id . '/' . $name);
        return response()->download($filepath);
    }

    public function delete_image($stud_id, $name, $img_id)
    {
        $filepath = '/attachments/students/'. $stud_id . '/' . $name;
        Storage::disk('student_attachments')->delete($filepath);

        $image = Image::findOrFail($img_id);
        $image->delete();

        toastr()->success(trans('messages.success'));
        return redirect(route('students.show', $stud_id));
    }
}
