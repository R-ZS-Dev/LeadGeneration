<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GeneralEvent extends Model
{
    protected $primaryKey = 'g_id';
    protected $fillable = [
        'note',
        'g_description',
        'g_display',
        'g_active',
        'g_quick',
        'g_insertby',
        'close',
        'status',
    ];

    public function caseGeneralEvents()
    {
        return $this->hasMany(CaseGeneralEvent::class, 'cge_note', 'g_id');
    }
}
