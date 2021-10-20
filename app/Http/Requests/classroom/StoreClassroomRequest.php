<?php

namespace App\Http\Requests\classroom;

use Illuminate\Foundation\Http\FormRequest;

class StoreClassroomRequest extends FormRequest
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
            'List_Classes.*.name_en' => 'required',
            'List_Classes.*.name_ar' => 'required',
            'List_Classes.*.grade' => 'required',
        ];
    }
}
