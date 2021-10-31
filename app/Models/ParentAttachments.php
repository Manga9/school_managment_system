<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ParentAttachments extends Model
{
    protected $table = 'parent_attachments';
    protected $fillable = ['file_name', 'parent_id'];
}
