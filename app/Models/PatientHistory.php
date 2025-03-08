<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PatientHistory extends Model
{
    protected $table = 'patient_history';

    protected $primaryKey = 'ph_id';

    public $timestamps = true;

    protected $fillable = [
        'ph_userid',
        'ph_medicalsum',
        'ph_diagnosis',
        'ph_allergies',
        'ph_insertby',
        'status',
        'close',
    ];
}
