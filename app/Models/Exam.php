<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Exam extends Model
{
    use HasTranslations;

    protected $translatable = ['name'];
    protected $guarded = [];

    public function subject() {
        return $this->belongsTo(Subject::class);
    }

    public function grade() {
        return $this->belongsTo(Grade::class);
    }

    public function classroom() {
        return $this->belongsTo(Classroom::class);
    }
}
