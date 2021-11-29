<?php

namespace App\Http\Requests\question;

use Illuminate\Foundation\Http\FormRequest;

class StoreQuestionRequest extends FormRequest
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
            'title' => 'required',
            'answers' => 'required',
            'right_answer' => 'required',
            'exam_id' => 'required',
            'score' => 'required',
        ];
    }
}
