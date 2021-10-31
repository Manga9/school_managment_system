<?php

namespace App\Http\Requests\teacher;

use Illuminate\Foundation\Http\FormRequest;

class StoreTeacherRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => 'required|email|unique:teachers,email,' . request()->get('email') . ',email',
            'password' => 'required|min:8',
            'name_en' => 'required',
            'name_ar' => 'required',
            'join' => 'required',
            'spec' => 'required',
            'gender' => 'required',
            'address' => 'required',
        ];
    }
}
