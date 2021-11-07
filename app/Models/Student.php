<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class Student extends Model
{
    use HasTranslations;
    use SoftDeletes;

    protected $translatable = ['name'];
    protected $guarded = [];

    public function gender()
    {
        return $this->belongsTo(Gender::class);
    }

    public function grade()
    {
        return $this->belongsTo(Grade::class);
    }

    public function classroom()
    {
        return $this->belongsTo(Classroom::class);
    }

    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    public function blood()
    {
        return $this->belongsTo(Blood::class, 'blood_type_id');
    }

    public function nationality()
    {
        return $this->belongsTo(Nationality::class);
    }

    public function myParent()
    {
        return $this->belongsTo(MyParent::class, 'parent_id');
    }

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
}
