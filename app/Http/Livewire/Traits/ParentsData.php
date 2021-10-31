<?php

namespace App\Http\Livewire\Traits;

use App\Models\MyParent;
use App\Models\ParentAttachments;
use App\utils\InputFilter;

trait ParentsData
{
    public $updateMode = false;
    public $showTable = true;
    public $errorMsg;
    public $photos;
    public $successMsg = '';
    public $currentStep = 1,
        //Father variables
        $parentt_id, $email, $password, $father_name_ar, $father_name_en,
        $father_job_ar, $father_job_en, $father_national_id, $father_passport_id,
        $father_phone, $father_nationality_id, $father_blood_type_id,
        $father_religion_id, $father_address,

        //Mother variables
        $mother_name_ar, $mother_name_en,
        $mother_job_ar, $mother_job_en, $mother_national_id, $mother_passport_id,
        $mother_phone, $mother_nationality_id, $mother_blood_type_id,
        $mother_religion_id, $mother_address;


    private function stepOneRules(): array{
        return [
            'email' => 'required|email|unique:my_parents,email,'.$this->parentt_id.',id',
            'password' => 'required|min:8',
            'father_name_ar' => 'required',
            'father_name_en' => 'required',
            'father_job_ar' => 'required',
            'father_job_en' => 'required',
            'father_national_id' => 'required|numeric|unique:my_parents,father_national_id,'.$this->parentt_id.',id',
            'father_phone' => 'regex:/^([0-9\s\-\+\(\)]*)$/|min:11|required|unique:my_parents,father_phone,'.$this->parentt_id.',id',
            'father_nationality_id' => 'required',
            'father_blood_type_id' => 'required',
            'father_religion_id' => 'required',
            'father_address' => 'required',
            'father_passport_id' => 'nullable|min:11|numeric|unique:my_parents,father_passport_id,'.$this->parentt_id.',id',
        ];

    }

    private function stepTwoRules(): array{
        return [
            'mother_name_ar' => 'required',
            'mother_name_en' => 'required',
            'mother_job_ar' => 'required',
            'mother_job_en' => 'required',
            'mother_national_id' => 'required|numeric|unique:my_parents,mother_national_id,'.$this->parentt_id.',id',
            'mother_phone' => 'regex:/^([0-9\s\-\+\(\)]*)$/|min:11|required|unique:my_parents,mother_phone,'.$this->parentt_id.',id',
            'mother_nationality_id' => 'required',
            'mother_blood_type_id' => 'required',
            'mother_religion_id' => 'required',
            'mother_address' => 'required',
            'mother_passport_id' => 'nullable|min:11|numeric|unique:my_parents,mother_passport_id,'.$this->parentt_id.',id',
        ];

    }

    public function insertParentData() : array
    {
        return [
            'email' => InputFilter::htmlEscape($this->email),
            'password' => InputFilter::htmlEscape(bcrypt($this->password)),
            'father_name' => ['en' => InputFilter::htmlEscape($this->father_name_en), 'ar' => InputFilter::htmlEscape($this->father_name_ar)],
            'father_job' => ['en' => InputFilter::htmlEscape($this->father_job_en), 'ar' => InputFilter::htmlEscape($this->father_job_ar)],
            'father_national_id' => InputFilter::htmlEscape($this->father_national_id),
            'father_phone' => InputFilter::htmlEscape($this->father_phone),
            'father_passport_id' => InputFilter::htmlEscape($this->father_passport_id),
            'father_nationality_id' => InputFilter::htmlEscape($this->father_nationality_id),
            'father_blood_type_id' => InputFilter::htmlEscape($this->father_blood_type_id),
            'father_religion_id' => InputFilter::htmlEscape($this->father_religion_id),
            'father_address' => InputFilter::htmlEscape($this->father_address),

            'mother_name' => ['en' => InputFilter::htmlEscape($this->mother_name_en), 'ar' => InputFilter::htmlEscape($this->mother_name_ar)],
            'mother_job' => ['en' => InputFilter::htmlEscape($this->mother_job_en), 'ar' => InputFilter::htmlEscape($this->mother_job_ar)],
            'mother_national_id' => InputFilter::htmlEscape($this->mother_national_id),
            'mother_phone' => InputFilter::htmlEscape($this->mother_phone),
            'mother_passport_id' => InputFilter::htmlEscape($this->mother_passport_id),
            'mother_nationality_id' => InputFilter::htmlEscape($this->mother_nationality_id),
            'mother_blood_type_id' => InputFilter::htmlEscape($this->mother_blood_type_id),
            'mother_religion_id' => InputFilter::htmlEscape($this->mother_religion_id),
            'mother_address' => InputFilter::htmlEscape($this->mother_address),
        ];
    }

    public function UploadFiles()
    {
        if (!empty($this->photos)){
            foreach ($this->photos as $photo) {
                $photoName = date('YmdHis') . "." . $photo->getClientOriginalName();
                $photo->storeAs($this->father_national_id, $photoName, 'parent_attachments');
                ParentAttachments::create([
                    'file_name' => $photoName,
                    'parent_id' => MyParent::latest()->first()->id,
                ]);
            }
        }
    }
}
