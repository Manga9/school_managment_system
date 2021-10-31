<?php

namespace App\Http\Controllers;

use App\Http\Requests\teacher\StoreTeacherRequest;
use App\Repository\Teacher\TeacherRepositoryInterface;
use App\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    protected $teacher;

    public function __construct(TeacherRepositoryInterface $teacher)
    {
        $this->teacher = $teacher;
    }

    public function index()
    {
        $teachers = $this->teacher->getAllTeachers();
        return view('teachers.teachers', compact('teachers'));
    }

    public function create()
    {
        $specs = $this->teacher->getAllSpecilaizations();
        $genders = $this->teacher->getAllGenders();
        return view('teachers.create', compact('specs', 'genders'));
    }

    public function store(StoreTeacherRequest $request)
    {
       return $this->teacher->storeTeacher($request);
    }

    public function show(Teacher $teacher)
    {
        //
    }

    public function edit($id)
    {
        $teacher = $this->teacher->editTeacher($id);
        $specs = $this->teacher->getAllSpecilaizations();
        $genders = $this->teacher->getAllGenders();
        return view('teachers.edit', compact('teacher', 'specs', 'genders'));
    }

    public function update(StoreTeacherRequest $request, $id)
    {
        return $this->teacher->updateTeacher($request, $id);
    }

    public function destroy($id)
    {
        return $this->teacher->deleteTeacher($id);
    }
}
