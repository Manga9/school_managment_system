<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Nationality extends Model
{
    use HasTranslations;

    protected $table= "nationalities";
    protected $fillable = ['name'];
    public $translatable = ['name'];

}
