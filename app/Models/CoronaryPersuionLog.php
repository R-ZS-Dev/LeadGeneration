<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CoronaryPersuionLog extends Model
{
    protected $table = 'coronary_perfusion_logs';
    protected $primaryKey = 'cpl_id';

    protected $fillable = [
        'cpl_userid',
        'cpl_date',
        'cpl_time',
        'cpl_cpgtype',
        'cpl_dose',
        'cpl_temp',
        'transfusion_time',
        'ischemic_time',
        'cpl_mixture',
        'svgperfcount',
        'cpl_note',
        'cpl_insertby',
        'cpl_status',
        'cpl_close',

    ];
}
