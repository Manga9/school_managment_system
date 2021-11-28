<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Subject extends Model
{
    use HasTranslations;

    protected $fillable = ['name', 'grade_id', 'classroom_id', 'teacher_id'];
    protected $translatable = ['name'];

    public function grade() {
        return $this->belongsTo(Grade::class);
    }

    public function classroom() {
        return $this->belongsTo(Classroom::class);
    }

    public function teacher() {
        return $this->belongsTo(Teacher::class);
    }
}
