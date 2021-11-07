<?php

namespace App\Http\Controllers;

use App\Http\Requests\teacher\StoreTeacherRequest;
use App\Repository\MainRepositoryInterface;

class TeacherController extends Controller
{
    protected $teacher;

    public function __construct(MainRepositoryInterface $teacher)
    {
        $this->teacher = $teacher;
    }

    public function index()
    {
        $teachers = $this->teacher->getAllItems();
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
       return $this->teacher->storeItem($request);
    }

    public function show(Teacher $teacher)
    {
        //
    }

    public function edit($id)
    {
        $teacher = $this->teacher->editItem($id);
        $specs = $this->teacher->getAllSpecilaizations();
        $genders = $this->teacher->getAllGenders();
        return view('teachers.edit', compact('teacher', 'specs', 'genders'));
    }

    public function update(StoreTeacherRequest $request, $id)
    {
        return $this->teacher->updateItem($request, $id);
    }

    public function destroy($id)
    {
        return $this->teacher->deleteItem($id);
    }
}
