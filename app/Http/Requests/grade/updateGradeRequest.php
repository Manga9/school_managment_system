<?php

namespace App\Http\Requests\grade;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Request;

class updateGradeRequest extends FormRequest
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
            'name_en' => 'required|unique:grades,name->en,'. \request()->get('name_en') .',name->en',
            'name_ar' => 'required|unique:grades,name->ar,'. \request()->get('name_ar') .',name->ar',
        ];
    }
}
