<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LabRanges extends Model
{
    protected $table = 'lab_ranges';
    protected $primaryKey = 'lrng_id';
    public $timestamps = true;

    protected $fillable = [
        'lab_id',
        'lab_result',
        'sex',
        'is_child',
        'source',
        'temperature',
        'expected_low',
        'expected_high',
        'minimum',
        'maximum',
        'inserted_by',
        'close',
        'status',
    ];

    public function lab()
    {
        return $this->belongsTo(Lab::class, 'lab_id', 'l_id');
    }

    public function result()
    {
        return $this->belongsTo(LabResult::class, 'lab_result', 'lr_id');
    }
}
