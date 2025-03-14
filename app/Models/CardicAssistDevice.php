<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CardicAssistDevice extends Model
{
    protected $table = 'cardic_assist_devices';
    protected $primaryKey = 'cad_id';

    protected $fillable = [
        'pat_id',
        'iab_pump',
        'iabp_insertion',
        'iabp_reason',
        'cbad_use',
        'cbad_type',
        'cbad_inserted',
        'cbad_reason',
        'ecmo_sel',
        'ecmo_initiated',
        'ecmo_clinical',
        'wpa_vad',
        'piaf_vad',
        'vad_date_ins',
        'vad_dev_model',
        'vad_udi',
        'vad_indication',
        'vad_type',
        'peda_vad',
        'vad_timing',
        'vad_date',
        'vadid_hos',
        'vadidh_timing',
        'vadidh_indication',
        'vadidh_type',
        'vadidh_device',
        'vadidh_initial_date',
        'vadidh_udi',
        'vadidh_vad_exp',
        'vadidh_reason',
        'vadidh_date',
        'sec_di',
        'sec_timing',
        'sec_indication',
        'sec_type',
        'sec_device',
        'sec_implant_date',
        'sec_udi',
        'sec_vad_expl',
        'sec_reason',
        'sec_date',
        'th_dev_imp',
        'th_timing',
        'th_indication',
        'th_type',
        'th_device',
        'th_implant_date',
        'th_udi',
        'th_vad_expla',
        'th_reason',
        'th_date',
        'crma_dev',
        'first_complication',
        'second_complication',
        'third_complication',
        'cad_insertby',
        'status',
        'close',
    ];
    
    protected $casts = [
        'vad_date_ins' => 'date',
        'vad_date' => 'date',
        'vadidh_initial_date' => 'date',
        'vadidh_date' => 'date',
        'sec_implant_date' => 'date',
        'sec_date' => 'date',
        'th_implant_date' => 'date',
        'th_date' => 'date',
    ];
    
}
