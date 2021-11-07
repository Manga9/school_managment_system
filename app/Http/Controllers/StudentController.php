<?php

namespace App\Http\Controllers;

use App\Http\Requests\student\StoreStudentRequest;
use App\Models\Section;
use App\Models\Student;
use App\Repository\Student\StudentRepo;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    protected $student;

    public function __construct(StudentRepo $student)
    {
        $this->student = $student;
    }

    public function index()
    {
        $students = $this->student->getAllItems();
        return view('students.students', compact('students'));
    }

    public function create()
    {
        return $this->student->createStudent();
    }

    public function store(StoreStudentRequest $request)
    {
        return $this->student->storeItem($request);
    }

    public function show(Student $student)
    {
        return view('students.show', compact('student'));
    }

    public function edit($id)
    {
        return $this->student->editItem($id);
    }

    public function update(StoreStudentRequest $request, $id)
    {
        return $this->student->updateItem($request, $id);
    }

    public function destroy($id)
    {
        return $this->student->deleteItem($id);
    }

    public function getSections($id)
    {
        return $this->student->getSections($id);
    }

    public function upload_images(Request $request, $id)
    {
        return $this->student->upload_images($request, $id);
    }

    public function download_image($id, $name)
    {
        return $this->student->download_image($id, $name);
    }

    public function delete_image($stud_id, $name, $img_id)
    {
        return $this->student->delete_image($stud_id, $name, $img_id);
    }
}
