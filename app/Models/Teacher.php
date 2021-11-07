<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Teacher extends Model
{
    use HasTranslations;

    protected $guarded = [];
    protected $table = 'teachers';
    protected $translatable = ['name'];

    public function specialization()
    {
        return $this->belongsTo(Specialization::class, 'specialization_id');
    }

    public function gender()
    {
        return $this->belongsTo(Gender::class);
    }

    public function sections()
    {
        return $this->belongsToMany(Section::class);
    }
}
