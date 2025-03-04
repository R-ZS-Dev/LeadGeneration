<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Checklist extends Model
{
    //
    protected $primaryKey = 'c_id';
    protected $fillable = [
        'l_name',
        'l_description',
        'rowboxes',
        'l_active',
        'l_insertby',
        'close',
        'status',
    ];
}
