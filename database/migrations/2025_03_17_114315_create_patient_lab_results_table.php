<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('patient_lab_results', function (Blueprint $table) {
            $table->id('plr_id');
            $table->unsignedBigInteger('pat_id');
            $table->unsignedBigInteger('lab_id')->nullable()->collation('utf8mb4_general_ci');

            $table->enum('c_arterial', ['0', '1', '2'])->default('0')->collation('utf8mb4_general_ci');
            $table->enum('c_temp', ['0', '1'])->default('0')->collation('utf8mb4_general_ci');
            $table->date('draw_date')->collation('utf8mb4_general_ci');
            $table->time('draw_time')->collation('utf8mb4_general_ci');
            $table->date('result_date')->collation('utf8mb4_general_ci');
            $table->time('result_time')->collation('utf8mb4_general_ci');
            $table->string('billing_code', 30)->nullable()->collation('utf8mb4_general_ci');
            $table->text('note')->nullable()->collation('utf8mb4_general_ci');

            $table->unsignedBigInteger('act_act')->nullable()->collation('utf8mb4_general_ci'); // ACT (seconds, whole numbers)
            $table->decimal('act_hep_test_conc', 8, 2)->nullable()->collation('utf8mb4_general_ci'); // Heparin Test Concentration (mg/kg)
            $table->decimal('act_hep_bolus_indic', 8, 2)->nullable()->collation('utf8mb4_general_ci'); // Heparin Bolus Indicator (unit)
            $table->decimal('act_hep_maint_indic', 8, 2)->nullable()->collation('utf8mb4_general_ci'); // Heparin Maintenance Indicator (units)
            $table->decimal('act_prot_indic', 8, 2)->nullable()->collation('utf8mb4_general_ci'); // Protamine Indicator (mg)

            $table->decimal('bg_ph', 4, 2)->nullable()->collation('utf8mb4_general_ci'); // pH values (7.32 - 7.45)
            $table->decimal('bg_p02', 8, 2)->nullable()->collation('utf8mb4_general_ci'); // Oxygen pressure (ImmHg)
            $table->decimal('bg_pco2', 8, 2)->nullable()->collation('utf8mb4_general_ci'); // CO2 pressure (ImmHg)
            $table->decimal('bg_ca', 8, 2)->nullable()->collation('utf8mb4_general_ci'); // Calcium (Immol/L)
            $table->decimal('bg_k', 8, 2)->nullable()->collation('utf8mb4_general_ci'); // Potassium (Immol/L)
            $table->decimal('bg_thb', 8, 2)->nullable()->collation('utf8mb4_general_ci'); // Total Hemoglobin (g/dL)
            $table->decimal('bg_so2', 5, 2)->nullable()->collation('utf8mb4_general_ci'); // Oxygen Saturation (%)
            $table->decimal('bg_lactate', 8, 2)->nullable()->collation('utf8mb4_general_ci'); // Lactate (mmol/L)
            $table->unsignedBigInteger('bg_hct')->nullable()->collation('utf8mb4_general_ci'); // Hematocrit (%)

            $table->decimal('bs_gluc', 8, 2)->nullable()->collation('utf8mb4_general_ci');

            $table->decimal('cbc_wbc', 8, 2)->nullable()->collation('utf8mb4_general_ci'); // WBC (K/ul)
            $table->unsignedBigInteger('cbc_hgb')->nullable()->collation('utf8mb4_general_ci'); // Hgb (g/dL)
            $table->unsignedBigInteger('cbc_hct')->nullable()->collation('utf8mb4_general_ci'); // Hct (%)
            $table->unsignedBigInteger('cbc_mcv')->nullable()->collation('utf8mb4_general_ci'); // MCV (picograms)
            $table->decimal('cbc_mch', 8, 2)->nullable()->collation('utf8mb4_general_ci'); // MCH (pg)
            $table->unsignedBigInteger('cbc_mchc')->nullable()->collation('utf8mb4_general_ci'); // MCHC (%)
            $table->unsignedBigInteger('cbc_rdw')->nullable()->collation('utf8mb4_general_ci'); // RDW (%)
            $table->unsignedBigInteger('cbc_plt')->nullable()->collation('utf8mb4_general_ci'); // PLT (mL)
            $table->decimal('cbc_mpv', 8, 2)->nullable()->collation('utf8mb4_general_ci'); // MPV (femtoliters)
            $table->unsignedBigInteger('cbc_rbc')->nullable()->collation('utf8mb4_general_ci'); // RBC (cmm)

            $table->decimal('cdi_ph', 8, 2)->nullable()->collation('utf8mb4_general_ci'); // pH (7.32 - 7.45)
            $table->decimal('cdi_paco2', 8, 2)->nullable()->collation('utf8mb4_general_ci'); // PaCO2 (mm Hg)
            $table->decimal('cdi_pao2', 8, 2)->nullable()->collation('utf8mb4_general_ci'); // PaO2 (mm Hg)
            $table->decimal('cdi_t', 8, 2)->nullable()->collation('utf8mb4_general_ci'); // Temperature (F)
            $table->decimal('cdi_hco3', 8, 2)->nullable()->collation('utf8mb4_general_ci'); // HCO3 (mEq/L)
            $table->decimal('cdi_be', 8, 2)->nullable()->collation('utf8mb4_general_ci'); // Base Excess (B.E.) (-2 to +2)
            $table->decimal('cdi_sao2', 8, 2)->nullable()->collation('utf8mb4_general_ci'); // SaO2 (%)
            $table->decimal('cdi_k', 8, 2)->nullable()->collation('utf8mb4_general_ci'); // Potassium (K+) (mmol/L)
            $table->decimal('cdi_so2', 8, 2)->nullable()->collation('utf8mb4_general_ci'); // SO2 (%)
            $table->unsignedBigInteger('cdi_hct')->nullable()->collation('utf8mb4_general_ci'); // Hematocrit (Hct) (%)
            $table->unsignedBigInteger('cdi_hgb')->nullable()->collation('utf8mb4_general_ci'); // Hemoglobin (Hgb) (g/dL)

            $table->unsignedBigInteger('cp_alt')->nullable()->collation('utf8mb4_general_ci'); // ALT (IU/L)
            $table->decimal('cp_albumin', 8, 2)->nullable()->collation('utf8mb4_general_ci'); // Albumin (g/dL)
            $table->decimal('cp_ag_ratio', 8, 2)->nullable()->collation('utf8mb4_general_ci'); // A/G Ratio
            $table->unsignedBigInteger('cp_alp')->nullable()->collation('utf8mb4_general_ci'); // ALP (IU/L)
            $table->unsignedBigInteger('cp_ast')->nullable()->collation('utf8mb4_general_ci'); // AST (IU/L)
            $table->decimal('cp_tbi', 8, 2)->nullable()->collation('utf8mb4_general_ci'); // Total Bilirubin (mg/dL)
            $table->unsignedBigInteger('cp_bun')->nullable()->collation('utf8mb4_general_ci'); // BUN (mg/dL)
            $table->decimal('cp_bun_crea', 8, 2)->nullable()->collation('utf8mb4_general_ci'); // BUN/CREA Ratio
            $table->decimal('cp_ca', 8, 2)->nullable()->collation('utf8mb4_general_ci'); // Calcium (mg/dL)
            $table->unsignedBigInteger('cp_cl')->nullable()->collation('utf8mb4_general_ci'); // Chloride (ImEq/L)
            $table->decimal('cp_creatinine', 8, 2)->nullable()->collation('utf8mb4_general_ci'); // Creatinine (mg/dL)
            $table->unsignedBigInteger('cp_gluc')->nullable()->collation('utf8mb4_general_ci'); // Glucose (mg/dL)
            $table->decimal('cp_phosphorus', 8, 2)->nullable()->collation('utf8mb4_general_ci'); // Phosphorus (mg/dL)
            $table->decimal('cp_k', 8, 2)->nullable()->collation('utf8mb4_general_ci'); // Potassium (mEq/L)
            $table->unsignedBigInteger('cp_na')->nullable()->collation('utf8mb4_general_ci'); // Sodium (ImEq/L)

            $table->decimal('cbcr_Hct', 5, 2)->nullable()->collation('utf8mb4_general_ci'); // Hematocrit (%)
            $table->decimal('cbcr_Hgb', 5, 2)->nullable()->collation('utf8mb4_general_ci'); // Hemoglobin (g/dL)
            $table->decimal('cbcr_MCV', 5, 2)->nullable()->collation('utf8mb4_general_ci'); // Mean Corpuscular Volume (picograms)
            $table->decimal('cbcr_MCHC', 5, 2)->nullable()->collation('utf8mb4_general_ci'); // Mean Corpuscular Hemoglobin Concentration (%)
            $table->decimal('cbcr_RDW', 5, 2)->nullable()->collation('utf8mb4_general_ci'); // Red Cell Distribution Width (%)
            $table->unsignedBigInteger('cbcr_PLT')->nullable()->collation('utf8mb4_general_ci'); // Platelet Count (mL)
            $table->decimal('cbcr_MPV', 5, 2)->nullable()->collation('utf8mb4_general_ci'); // Mean Platelet Volume (femtoliters)
            $table->unsignedBigInteger('cbcr_WBC_leukocyte')->nullable()->collation('utf8mb4_general_ci'); // White Blood Cell Count (cmm)
            $table->decimal('cbcr_WBC_differential_Monocytes', 5, 2)->nullable()->collation('utf8mb4_general_ci'); // Monocytes (%)
            $table->decimal('cbcr_WBC_differential_Eosinophils', 5, 2)->nullable()->collation('utf8mb4_general_ci'); // Eosinophils (%)
            $table->decimal('cbcr_WBC_differential_Basophils', 5, 2)->nullable()->collation('utf8mb4_general_ci'); // Basophils (%)
            $table->decimal('cbcr_WBC_differential_Neutrophils', 5, 2)->nullable()->collation('utf8mb4_general_ci'); // Neutrophils (%)
            $table->decimal('cbcr_WBC_differential_Lymphocytes', 5, 2)->nullable()->collation('utf8mb4_general_ci'); // Lymphocytes (%)
            $table->unsignedBigInteger('cbcr_RBC_erythrocyte_count')->nullable()->collation('utf8mb4_general_ci'); // Red Blood Cell Count (cmm)

            $table->decimal('cmp_gluc', 5, 2)->nullable()->collation('utf8mb4_general_ci'); // Glucose (mg/dL)
            $table->decimal('cmp_bun', 5, 2)->nullable()->collation('utf8mb4_general_ci'); // Blood Urea Nitrogen (mg/dL)
            $table->decimal('cmp_creatinine', 5, 2)->nullable()->collation('utf8mb4_general_ci'); // Creatinine (mg/dL)
            $table->decimal('cmp_ca', 5, 2)->nullable()->collation('utf8mb4_general_ci'); // Calcium (mg/dL)
            $table->decimal('cmp_tbi', 5, 2)->nullable()->collation('utf8mb4_general_ci'); // Total Bilirubin (mg/dL)
            $table->decimal('cmp_alp', 6, 2)->nullable()->collation('utf8mb4_general_ci'); // Alkaline Phosphatase (IU/L)
            $table->decimal('cmp_tp', 5, 2)->nullable()->collation('utf8mb4_general_ci'); // Total Protein (g/dL)
            $table->decimal('cmp_alt', 6, 2)->nullable()->collation('utf8mb4_general_ci'); // ALT (IU/L)
            $table->decimal('cmp_ast', 6, 2)->nullable()->collation('utf8mb4_general_ci'); // AST (IU/L)
            $table->string('cmp_a_g_ratio', 15)->nullable()->collation('utf8mb4_general_ci'); // A/G Ratio (String for format like "1.01:1")
            $table->string('cmp_bun_crea', 15)->nullable()->collation('utf8mb4_general_ci'); // BUN/Creatinine Ratio (String for format like "10:1")
            $table->decimal('cmp_glob', 5, 2)->nullable()->collation('utf8mb4_general_ci'); // Globulin (g/dL)
            $table->decimal('cmp_na', 5, 2)->nullable()->collation('utf8mb4_general_ci'); // Sodium (mEq/L)
            $table->decimal('cmp_k', 5, 2)->nullable()->collation('utf8mb4_general_ci'); // Potassium (mEq/L)
            $table->decimal('cmp_cl', 5, 2)->nullable()->collation('utf8mb4_general_ci'); // Chloride (mEq/L)
            $table->decimal('cmp_eco2', 5, 2)->nullable()->collation('utf8mb4_general_ci'); // Bicarbonate (mmol/L)
            $table->decimal('cmp_a_gap', 5, 2)->nullable()->collation('utf8mb4_general_ci'); // Anion Gap
            $table->decimal('cmp_egfr', 6, 2)->nullable()->collation('utf8mb4_general_ci'); // eGFR (ml/min/1.73m²)

            $table->decimal('lp_cholesterol', 6, 2)->nullable()->collation('utf8mb4_general_ci'); // Cholesterol (mg/dL)
            $table->decimal('lp_hdl', 6, 2)->nullable()->collation('utf8mb4_general_ci'); // HDL (mg/dL)
            $table->decimal('lp_ldl', 6, 2)->nullable()->collation('utf8mb4_general_ci'); // LDL (mg/dL)
            $table->decimal('lp_trigyl_tot', 6, 2)->nullable()->collation('utf8mb4_general_ci'); // Triglycerides Total (mg/dL)
            $table->decimal('lp_ast', 6, 2)->nullable()->collation('utf8mb4_general_ci'); // AST (IU/L)
            $table->decimal('lp_alt', 6, 2)->nullable()->collation('utf8mb4_general_ci'); // ALT (IU/L)

            $table->decimal('lpr_cholesterol', 6, 2)->nullable()->collation('utf8mb4_general_ci'); // Cholesterol (mg/dL)
            $table->decimal('lpr_trigyl_tot', 6, 2)->nullable()->collation('utf8mb4_general_ci'); // Triglycerides Total (mg/dL)
            $table->decimal('lpr_hdl', 6, 2)->nullable()->collation('utf8mb4_general_ci'); // HDL (mg/dL)
            $table->decimal('lpr_ldl', 6, 2)->nullable()->collation('utf8mb4_general_ci'); // LDL (mg/dL)
            $table->string('lpr_total_cholesterol_hdl_ratio', 15)->nullable()->collation('utf8mb4_general_ci'); // Cholesterol/HDL Ratio

            $table->decimal('nbg_ph', 4, 2)->nullable()->collation('utf8mb4_general_ci'); // pH (7.32 - 7.45)
            $table->decimal('nbg_pao2', 6, 2)->nullable()->collation('utf8mb4_general_ci'); // PaO2 (mm Hg)
            $table->decimal('nbg_hco3', 6, 2)->nullable()->collation('utf8mb4_general_ci'); // HCO3 (mEq/L)
            $table->decimal('nbg_paco2', 6, 2)->nullable()->collation('utf8mb4_general_ci'); // PaCO2 (mm Hg)
            $table->decimal('nbg_be', 5, 2)->nullable()->collation('utf8mb4_general_ci'); // Base Excess (-2 to +2 mEq/L)
            $table->decimal('nbg_sao2', 5, 2)->nullable()->collation('utf8mb4_general_ci'); // SaO2 (%)

            $table->decimal('ract_ph', 5, 2)->nullable()->collation('utf8mb4_general_ci');
            $table->decimal('ract_pco2', 5, 2)->nullable()->collation('utf8mb4_general_ci');
            $table->decimal('ract_po2', 5, 2)->nullable()->collation('utf8mb4_general_ci');
            $table->decimal('ract_hco3', 5, 2)->nullable()->collation('utf8mb4_general_ci');
            $table->decimal('ract_be_b', 5, 2)->nullable()->collation('utf8mb4_general_ci');
            $table->decimal('ract_hct', 5, 2)->nullable()->collation('utf8mb4_general_ci');
            $table->decimal('ract_thb', 5, 2)->nullable()->collation('utf8mb4_general_ci');
            $table->decimal('ract_so2', 5, 2)->nullable()->collation('utf8mb4_general_ci');
            $table->decimal('ract_na', 5, 2)->nullable()->collation('utf8mb4_general_ci');
            $table->decimal('ract_k', 5, 2)->nullable()->collation('utf8mb4_general_ci');
            $table->decimal('ract_ca', 5, 2)->nullable()->collation('utf8mb4_general_ci');
            $table->decimal('ract_glu', 5, 2)->nullable()->collation('utf8mb4_general_ci');
            $table->decimal('ract_lac', 5, 2)->nullable()->collation('utf8mb4_general_ci');
            $table->decimal('ract_act', 5, 2)->nullable()->collation('utf8mb4_general_ci');
            $table->decimal('ract_hep_test_conc', 5, 2)->nullable()->collation('utf8mb4_general_ci');
            $table->unsignedBigInteger('ract_hep_bolus_indic')->nullable()->collation('utf8mb4_general_ci');
            $table->unsignedBigInteger('ract_hep_maint_indic')->nullable()->collation('utf8mb4_general_ci');
            $table->unsignedBigInteger('ract_prot_indic')->nullable()->collation('utf8mb4_general_ci');
            $table->string('ract_ratio', 15)->nullable()->collation('utf8mb4_general_ci');

            $table->decimal('rapd_ph', 5, 2)->nullable()->collation('utf8mb4_general_ci');
            $table->decimal('rapd_pco2', 5, 2)->nullable()->collation('utf8mb4_general_ci');
            $table->decimal('rapd_po2', 5, 2)->nullable()->collation('utf8mb4_general_ci');
            $table->decimal('rapd_hco3', 5, 2)->nullable()->collation('utf8mb4_general_ci');
            $table->decimal('rapd_beb', 5, 2)->nullable()->collation('utf8mb4_general_ci');
            $table->decimal('rapd_hct', 5, 2)->nullable()->collation('utf8mb4_general_ci');
            $table->decimal('rapd_thb', 5, 2)->nullable()->collation('utf8mb4_general_ci');
            $table->decimal('rapd_so2', 5, 2)->nullable()->collation('utf8mb4_general_ci');
            $table->decimal('rapd_na', 5, 2)->nullable()->collation('utf8mb4_general_ci');
            $table->decimal('rapd_k', 5, 2)->nullable()->collation('utf8mb4_general_ci');
            $table->decimal('rapd_ca', 5, 2)->nullable()->collation('utf8mb4_general_ci');
            $table->decimal('rapd_glu', 5, 2)->nullable()->collation('utf8mb4_general_ci');
            $table->decimal('rapd_lac', 5, 2)->nullable()->collation('utf8mb4_general_ci');

            $table->decimal('thy_tsh', 5, 2)->nullable()->collation('utf8mb4_general_ci');
            $table->decimal('thy_totalt4', 5, 2)->nullable()->collation('utf8mb4_general_ci');
            $table->decimal('thy_freet4', 5, 2)->nullable()->collation('utf8mb4_general_ci');
            $table->decimal('thy_totalt3', 5, 2)->nullable()->collation('utf8mb4_general_ci');
            $table->decimal('thy_freet3', 5, 2)->nullable()->collation('utf8mb4_general_ci');
            $table->string('vitamin_d', 15)->nullable()->collation('utf8mb4_general_ci');

            $table->string('plr_insertby', 50)->collation('utf8mb4_general_ci');
            $table->enum('status', ['0', '1'])->default('1')->collation('utf8mb4_general_ci');
            $table->enum('close', ['0', '1'])->default('1')->collation('utf8mb4_general_ci');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patient_lab_results');
    }
};
