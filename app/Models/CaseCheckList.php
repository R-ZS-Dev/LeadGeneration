<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CaseCheckList extends Model
{
    use HasFactory;

    protected $table = 'case_check_lists';
    protected $primaryKey = 'cl_id';
    protected $fillable = [
        'pat_id',
        'list',
        'title',
        'items',
        'cl_insertby',
        'status',
        'close'
    ];

    public $timestamps = true;
}
