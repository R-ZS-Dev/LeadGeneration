<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChecklistGroup extends Model
{
    protected $table = 'checklist_groups';
    protected $primaryKey = 'clg_id';
    protected $fillable = [
        'clg_name',
        'clg_description',
        'rowboxes',
        'clg_active',
        'clg_insertby',
        'close',
        'status',
    ];
}