<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Fee extends Model
{
    use HasTranslations;
    protected $guarded = [];
    protected $translatable = ['title'];

    public function grade() {
        return $this->belongsTo(Grade::class);
    }

    public function classroom() {
        return $this->belongsTo(classroom::class);
    }
}
