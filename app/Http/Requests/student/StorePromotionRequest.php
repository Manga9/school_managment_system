<?php

namespace App\Http\Requests\student;

use Illuminate\Foundation\Http\FormRequest;

class StorePromotionRequest extends FormRequest
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
            'grade_id' => 'required',
            'classroom_id' => 'required',
            'section_id' => 'required',
            'grade_id_new' => 'required',
            'classroom_id_new' => 'required',
            'section_id_new' => 'required',
        ];
    }
}
