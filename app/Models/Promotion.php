<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    protected $guarded = [];

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }

    public function grade()
    {
        return $this->belongsTo(Grade::class, 'from_grade_id');
    }

    public function classroom()
    {
        return $this->belongsTo(Classroom::class, 'from_classroom_id');
    }

    public function section()
    {
        return $this->belongsTo(Section::class, 'from_section_id');
    }

    public function grade_to()
    {
        return $this->belongsTo(Grade::class, 'to_grade_id');
    }

    public function classroom_to()
    {
        return $this->belongsTo(Classroom::class, 'to_classroom_id');
    }

    public function section_to()
    {
        return $this->belongsTo(Section::class, 'to_section_id');
    }
}
