<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Online extends Model
{
    protected $guarded = [];

    public function grade() {
        return $this->belongsTo(Grade::class);
    }

    public function classroom() {
        return $this->belongsTo(Classroom::class);
    }

    public function section() {
        return $this->belongsTo(Section::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
