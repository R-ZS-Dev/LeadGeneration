<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CaseCheckList extends Model
{
    use HasFactory;

    protected $table = 'case_check_lists';
    protected $primaryKey = 'ccl_id';
    protected $fillable = [
        'pat_id',
        'cl_id',
        'cg_id',
        'cl_items',
        'cl_insertby',
        'status',
        'close'
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class, 'pat_id');
    }

    public function checklist()
    {
        return $this->belongsTo(Checklist::class, 'cl_id');
    }

    public function checklistGroup()
    {
        return $this->belongsTo(ChecklistGroup::class, 'cg_id');
    }

    public $timestamps = true;
}
