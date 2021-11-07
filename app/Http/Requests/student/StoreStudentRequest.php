<?php

namespace App\Http\Requests\student;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudentRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name_ar' => 'required',
            'name_en' => 'required',
            'email' => 'required|email|unique:students,email,'. request()->get('email') . ',email',
            'password' => 'required|string|min:6|max:10',
            'gender_id' => 'required',
            'nationality_id' => 'required',
            'blood_id' => 'required',
            'date_birth' => 'required|date|date_format:Y-m-d',
            'grade_id' => 'required',
            'classroom_id' => 'required',
            'section_id' => 'required',
            'parent_id' => 'required',
            'academic_year' => 'required',
        ];
    }
}
