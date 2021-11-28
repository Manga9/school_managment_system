<?php

namespace App\Http\Requests\exam;

use Illuminate\Foundation\Http\FormRequest;

class StoreExamRequest extends FormRequest
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
            'name_ar' => 'required',
            'name_en' => 'required',
            'grade_id' => 'required',
            'classroom_id' => 'required',
            'term' => 'required',
            'subject_id' => 'required',
            'academic_year' => 'required',
        ];
    }
}
