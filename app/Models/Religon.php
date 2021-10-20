<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Religon extends Model
{
    use HasTranslations;

    protected $table= "religons";
    protected $fillable = ['name'];
    public $translatable = ['name'];
}
