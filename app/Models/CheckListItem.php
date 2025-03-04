<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CheckListItem extends Model
{
    protected $table = 'checklist_items';
    protected $primaryKey = 'cl_id';
    protected $fillable = [
        'cl_name',
        'cl_description',
        'cl_active',
        'cl_insertby',
        'close',
        'status',
    ];
}
