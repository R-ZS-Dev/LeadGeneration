<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RiskFactor extends Model
{
    protected $table = 'risk_factors';
    protected $primaryKey = 'fr_id';
    public $timestamps = true;

    protected $fillable = [
        'fr_userid',
        'premature',
        'diabetes',
        'diabetes_control',
        'dyslipidemia',
        'dialysis',
        'hypertension',
        'endocarditis',
        'infect_endocard_type',
        'infect_endocard_culture',
        'tobacco',
        'lung_disease',
        'lung_disease_type',
        'pulomnary_test',
        'volumn_predict',
        'dlco_test',
        'dlco_predict',
        'roomair_abg',
        'cd_level',
        'oxy_level',
        'home_oxy',
        'inhaled_therapy',
        'sleep_apnea',
        'pneumonia',
        'illicit_drug',
        'Depression',
        'alco_use',
        'liver_disease',
        'immuno_present',
        'mediastinal',
        'cancer_within',
        'peripheral_artery',
        'Thoracic_aorta',
        'synocope',
        'unresponsive_state',
        'cerebrovascular',
        'priorcva',
        'priorcva_when',
        'cvdtia',
        'cvd_stenosis',
        'stenosis_right',
        'stanosis_left',
        'pre_carotid',
        'wbc_count',
        'hemoglobin',
        'hematocrit',
        'platelet_count',
        'lst_creatine_lvl',
        'total_albumin',
        'total_bilirubin',
        'aclevel',
        'inr',
        'meld_score',
        'bnp',
        'high_sensitive',
        'nterminal',
        'highultra_sensitive',
        'growth_diff',
        'antibody',
        'walkdone',
        'time1sec',
        'time2sec',
        'time3sec',
        'rf_insertby',
        'status',
        'close'
    ];
}
