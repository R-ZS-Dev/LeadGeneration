<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientLabResult extends Model
{
    use HasFactory;

    protected $table = 'patient_lab_results';

    protected $primaryKey = 'plr_id';

    public $timestamps = true;

    protected $fillable = [
        'pat_id',
        'lab_id',
        'c_arterial',
        'c_temp',
        'draw_date',
        'draw_time',
        'result_date',
        'result_time',
        'billing_code',
        'note',

        // ACT & Hepatology Tests
        'act_act',
        'act_hep_test_conc',
        'act_hep_bolus_indic',
        'act_hep_maint_indic',
        'act_prot_indic',

        // Blood Gas Tests
        'bg_ph',
        'bg_p02',
        'bg_pco2',
        'bg_ca',
        'bg_k',
        'bg_thb',
        'bg_so2',
        'bg_lactate',
        'bg_hct',

        // Blood Sugar
        'bs_gluc',

        // CBC Tests
        'cbc_wbc',
        'cbc_hgb',
        'cbc_hct',
        'cbc_mcv',
        'cbc_mch',
        'cbc_mchc',
        'cbc_rdw',
        'cbc_plt',
        'cbc_mpv',
        'cbc_rbc',

        // CDI Tests
        'cdi_ph',
        'cdi_paco2',
        'cdi_pao2',
        'cdi_t',
        'cdi_hco3',
        'cdi_be',
        'cdi_sao2',
        'cdi_k',
        'cdi_so2',
        'cdi_hct',
        'cdi_hgb',

        // Comprehensive Panel (CP)
        'cp_alt',
        'cp_albumin',
        'cp_ag_ratio',
        'cp_alp',
        'cp_ast',
        'cp_tbi',
        'cp_bun',
        'cp_bun_crea',
        'cp_ca',
        'cp_cl',
        'cp_creatinine',
        'cp_gluc',
        'cp_phosphorus',
        'cp_k',
        'cp_na',

        // Detailed CBC Tests
        'cbc_Hct',
        'cbc_Hgb',
        'cbc_MCV',
        'cbc_MCHC',
        'cbc_RDW',
        'cbc_PLT',
        'cbc_MPV',
        'cbc_WBC_leukocyte',
        'cbc_WBC_differential_Monocytes',
        'cbc_WBC_differential_Eosinophils',
        'cbc_WBC_differential_Basophils',
        'cbc_WBC_differential_Neutrophils',
        'cbc_WBC_differential_Lymphocytes',
        'cbc_RBC_erythrocyte_count',

        // CBCR Tests
        'cbcr_Hct',
        'cbcr_Hgb',
        'cbcr_MCV',
        'cbcr_MCHC',
        'cbcr_RDW',
        'cbcr_PLT',
        'cbcr_MPV',
        'cbcr_WBC_leukocyte',
        'cbcr_WBC_differential_Monocytes',
        'cbcr_WBC_differential_Eosinophils',
        'cbcr_WBC_differential_Basophils',
        'cbcr_WBC_differential_Neutrophils',
        'cbcr_WBC_differential_Lymphocytes',
        'cbcr_RBC_erythrocyte_count',

        // CMP Tests
        'cmp_gluc',
        'cmp_bun',
        'cmp_creatinine',
        'cmp_ca',
        'cmp_tbi',
        'cmp_alp',
        'cmp_tp',
        'cmp_alt',
        'cmp_ast',
        'cmp_a_g_ratio',
        'cmp_bun_crea',
        'cmp_glob',
        'cmp_na',
        'cmp_k',
        'cmp_cl',
        'cmp_eco2',
        'cmp_a_gap',
        'cmp_egfr',

        // Lipid Panel
        'lp_cholesterol',
        'lp_hdl',
        'lp_ldl',
        'lp_trigyl_tot',
        'lp_ast',
        'lp_alt',

        // Lipid Panel - Ratios
        'lpr_cholesterol',
        'lpr_trigyl_tot',
        'lpr_hdl',
        'lpr_ldl',
        'lpr_total_cholesterol_hdl_ratio',

        // Neonatal Blood Gas
        'nbg_ph',
        'nbg_pao2',
        'nbg_hco3',
        'nbg_paco2',
        'nbg_be',
        'nbg_sao2',

        // RACT Tests
        'ract_ph',
        'ract_pco2',
        'ract_po2',
        'ract_hco3',
        'ract_be_b',
        'ract_hct',
        'ract_thb',
        'ract_so2',
        'ract_na',
        'ract_k',
        'ract_ca',
        'ract_glu',
        'ract_lac',
        'ract_act',
        'ract_hep_test_conc',
        'ract_hep_bolus_indic',
        'ract_hep_maint_indic',
        'ract_prot_indic',

        // RAPD Tests
        'rapd_pH',
        'rapd_pCO2',
        'rapd_pO2',
        'rapd_HCO3',
        'rapd_BEB',
        'rapd_Hct',
        'rapd_tHb',
        'rapd_sO2',
        'rapd_Na',
        'rapd_K',
        'rapd_Ca',
        'rapd_Glu',
        'rapd_Lac',

        // Thyroid Tests
        'thy_TSH',
        'thy_TotalT4',
        'thy_FreeT4',
        'thy_TotalT3',
        'thy_FreeT3',

        // Vitamin D Test
        'vitamin_d',

        'plr_insertby',
        'status',
        'close',
    ];
    public function lab()
    {
        return $this->belongsTo(Lab::class, 'lab_id');
    }
    
}
