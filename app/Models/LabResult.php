<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LabResult extends Model
{
    protected $table = 'lab_results';
    protected $primaryKey = 'lr_id';
    public $timestamps = true; // Enable timestamps

    protected $fillable = [
        'lr_name',
        'lr_abbrivat',
        'unit_of_measure',
        'show_unit',
        'lr_desc',
        'expected_low',
        'expected_high',
        'maximum',
        'high_critical',
        'high_warn',
        'lr_rangefrom',
        'lr_rangeto',
        'minimum',
        'low_critical',
        'low_warn',
        'lr_active',
        'lr_insertby',
        'close',
        'status',
    ];
}
