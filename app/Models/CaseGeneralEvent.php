<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CaseGeneralEvent extends Model
{
    protected $table = 'case_general_events';
    protected $primaryKey = 'cge_id';

    protected $fillable = [
        'pat_id',
        'cge_date',
        'cge_time',
        'cge_note',
        'cge_insertby',
        'status',
        'close',
    ];
    
    public function note()
    {
        return $this->belongsTo(GeneralEvent::class, 'cge_note', 'g_id');
    }
}
