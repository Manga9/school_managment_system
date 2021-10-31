<?php

namespace App\Http\Livewire;

use App\Http\Livewire\Traits\ParentsData;
use App\Models\Blood;
use App\Models\MyParent;
use App\Models\Nationality;
use App\Models\ParentAttachments;
use App\Models\Religon;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class Parents extends Component
{
    use WithFileUploads;
    use ParentsData;
    public function render()
    {
        return view('livewire.parents.parents', [
            'Nationalities' => Nationality::all(),
            'Type_Bloods' => Blood::all(),
            'Religions' => Religon::all(),
            'parents' => MyParent::all(),
        ]);
    }

    public function firstStepSubmit()
    {
        $this->validate($this->stepOneRules());
        $this->currentStep = 2;
    }

    public function back($step)
    {
        $this->currentStep = $step;
    }

    public function secondStepSubmit() {
        $this->validate($this->stepTwoRules());
        $this->currentStep = 3;

    }

    public function submitForm()
    {
        try {
            MyParent::create($this->insertParentData());
            $this->UploadFiles();
            $this->successMsg = trans('messages.success');
            $this->reset();
            return redirect(route('add_parents'));
        } catch (\Exception $e) {
            $this->errorMsg = $e->getMessage();
        }
    }

    public function edit($id) {
        $this->showTable = false;
        $this->updateMode = true;
        $myParent = MyParent::findOrFail($id);
        $this->parentt_id = $id;
        $this->email = $myParent->email;
        $this->password = $myParent->password;

        $this->father_name_en = $myParent->getTranslation('father_name', 'en');
        $this->father_name_ar = $myParent->getTranslation('father_name', 'ar');
        $this->father_job_en = $myParent->getTranslation('father_job', 'en');
        $this->father_job_ar = $myParent->getTranslation('father_job', 'ar');
        $this->father_national_id = $myParent->father_national_id;
        $this->father_passport_id = $myParent->father_national_id;
        $this->father_nationality_id = $myParent->father_nationality_id;
        $this->father_blood_type_id = $myParent->father_blood_type_id;
        $this->father_religion_id = $myParent->father_religion_id;
        $this->father_phone = $myParent->father_phone;
        $this->father_address = $myParent->father_address;

        $this->mother_name_en = $myParent->getTranslation('mother_name', 'en');
        $this->mother_name_ar = $myParent->getTranslation('mother_name', 'ar');
        $this->mother_job_en = $myParent->getTranslation('mother_job', 'en');
        $this->mother_job_ar = $myParent->getTranslation('mother_job', 'ar');
        $this->mother_national_id = $myParent->mother_national_id;
        $this->mother_passport_id = $myParent->mother_national_id;
        $this->mother_nationality_id = $myParent->mother_nationality_id;
        $this->mother_blood_type_id = $myParent->mother_blood_type_id;
        $this->mother_religion_id = $myParent->mother_religion_id;
        $this->mother_phone = $myParent->mother_phone;
        $this->mother_address = $myParent->mother_address;
    }

    public function firstStepSubmit_edit()
    {
        $this->validate($this->stepOneRules());
        $this->currentStep = 2;
        $this->showTable = false;
        $this->updateMode = true;
    }

    public function secondStepSubmit_edit()
    {
        $this->validate($this->stepTwoRules());
        $this->currentStep = 3;
        $this->showTable = false;
        $this->updateMode = true;
    }

    public function submitForm_edit()
    {
        try {
            $myParent = MyParent::findOrFail($this->parentt_id);
            $myParent->update($this->insertParentData());
            $this->UploadFiles();
            $this->successMsg = trans('messages.success');
            return redirect(route('add_parents'));

        } catch (\Exception $e) {
            $this->errorMsg = $e->getMessage();
        }
    }

    public function delete($id)
    {
        $myParent = MyParent::findOrFail($id);
        $attachments = ParentAttachments::where('parent_id', $id)->get();
        if ($attachments)
        {
            foreach ($attachments as $attach) {
                Storage::disk('parent_attachments')->deleteDirectory($myParent->father_national_id);
            }
        }
        $myParent->delete();
        $this->successMsg = trans('messages.delete');
    }

    public function showAddForm()
    {
        $this->showTable = false;
    }
}
