<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentAccount extends Model
{
    protected $guarded = [];

    public function student() {
        return $this->belongsTo(Student::class);
    }

    public function feeInvoice() {
        return $this->belongsTo(FeeInvoice::class);
    }
}
