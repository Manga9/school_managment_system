<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Section extends Model
{
    use HasTranslations;

    protected $table = 'sections';
    protected $guarded = [];
    public $translatable = ['name'];


    public function classroom()
    {
        return $this->belongsTo(Classroom::class);
    }

    public function grade() {
        return $this->belongsTo(Grade::class);
    }


}
