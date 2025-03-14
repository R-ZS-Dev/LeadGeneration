<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AtrialFibrillation extends Model
{
    protected $table = 'atrial_fibrillations';

    protected $primaryKey = 'af_id';

    protected $fillable = [
        'pat_id',
        'epicardial_radio',
        'mlc_doc',
        'radio_frequency',
        'rf_bipolar',
        'cut_sew',
        'cryo',
        'procedures',
        'af_insertby',
        'status',
        'close'
    ];

    protected $casts = [
        'procedures' => 'array',
    ];
}
