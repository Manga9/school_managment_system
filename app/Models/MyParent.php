<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class MyParent extends Model
{
    use HasTranslations;
    public $translatable = ['father_name','father_job','mother_name','mother_job'];
    protected $table = 'my_parents';
    protected $guarded=[];

    public function father_nationality()
    {
        return $this->belongsTo(Nationality::class);
    }

    public function mother_nationality()
    {
        return $this->belongsTo(Nationality::class);
    }

    public function father_blood_type()
    {
        return $this->belongsTo(Blood::class);
    }

    public function mother_blood_type()
    {
        return $this->belongsTo(Blood::class);
    }

    public function father_religion()
    {
        return $this->belongsTo(Religon::class);
    }

    public function mother_religion()
    {
        return $this->belongsTo(Religon::class);
    }
}

