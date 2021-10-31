<?php

namespace App\Repository\Teacher;

interface TeacherRepositoryInterface {
    public function getAllTeachers();
    public function getAllSpecilaizations();
    public function getAllGenders();
    public function storeTeacher($request);
    public function editTeacher($id);
    public function updateTeacher($request, $id);
    public function deleteTeacher($id);
}


