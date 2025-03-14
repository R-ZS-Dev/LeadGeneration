<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CaseProcedures extends Model
{
    protected $table = 'case_procedure';
    protected $primaryKey = 'casep_id';
    public $timestamps = true;

    protected $fillable = [
        'pro_casetype', 'pro_casedesc', 'pro_approach', 'approach_type', 'robot_use', 'robot_useop',
        'pro_coroart', 'valve_surgery', 'vad_implant', 'other_cardiac', 'cardiac_fib', 'aortic_proce',
        'non_cardic', 'cptcode1', 'cptcode2', 'cptcode3', 'cptcode4', 'cptcode5', 'cptcode6',
        'cptcode7', 'cptcode8', 'cptcode9', 'cptcode10', 'orentrydate', 'orentrytime', 'orexitdate',
        'orexittime', 'initalintubedate', 'initalintubetime', 'initalextubedate', 'initalextubetime',
        'skinstrtdate', 'skinstrttime', 'skinenddate', 'skinendtime', 'anesthesiadate', 'anesthesiatime',
        'antibiotic', 'antiadmin', 'antidiscon', 'addintra', 'low_temp', 'temp_source', 'low_hemo',
        'low_hema', 'high_gluco', 'cpb_utilize', 'unplan_reason', 'cannulation', 'cannul_femo',
        'cannul_axil', 'cannul_inno', 'cannul_other', 'venous_femo', 'venous_jugular', 'veno_right_artial',
        'veno_left_artial', 'veno_pulmu', 'veno_cav', 'veno_other', 'bypass_time', 'circular_arrest',
        'arrest_without_cerebral', 'arrest_with_cerebral', 'cerebral_perfus_time', 'cerebral_perfus_type',
        'circulat_arrest', 'aortic_occl', 'cross_clamp', 'cardio_deliver', 'type_of_cardio', 'oximetry',
        'diffuse_aort', 'ascending', 'assess_aorta_disease', 'alterplan', 'intraop', 'intraoppro',
        'red_blood_cell', 'fresh_frozen', 'platelet_unit', 'crypo_unit', 'clothing_factor',
        'intraop_antifi', 'intraop_tee', 'aortic_insufi', 'mitral_insufi', 'tricuspid_insufi',
        'ejection_fract', 'cardiac_pci', 'combine_pro', 'proced_status', 'pci_procedure', 'stent_type' ,'casep_insertby'
    ];
}
