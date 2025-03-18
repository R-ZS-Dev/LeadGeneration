<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('risk_factors', function (Blueprint $table) {
            $table->id('fr_id');
            $table->integer('fr_userid');
            $table->enum('premature', ['0', '1','2'])->default('0')->nullable()->collation('utf8mb4_general_ci');
            $table->enum('diabetes', ['0', '1','2'])->default('0')->nullable()->collation('utf8mb4_general_ci');
            $table->string('diabetes_control')->nullable()->collation('utf8mb4_general_ci');
            $table->enum('dyslipidemia',['0', '1','2'])->default('0')->nullable()->collation('utf8mb4_general_ci');
            $table->enum('dialysis', ['0', '1','2'])->default('0')->nullable()->collation('utf8mb4_general_ci');
            $table->enum('hypertension', ['0', '1','2'])->default('0')->nullable()->collation('utf8mb4_general_ci');
            $table->enum('endocarditis', ['0', '1'])->default('0')->nullable()->collation('utf8mb4_general_ci');
            $table->string('infect_endocard_type')->nullable()->collation('utf8mb4_general_ci');
            $table->string('infect_endocard_culture')->nullable()->collation('utf8mb4_general_ci');
            $table->string('tobacco')->nullable()->collation('utf8mb4_general_ci');
            $table->string('lung_disease')->nullable()->collation('utf8mb4_general_ci');
            $table->string('lung_disease_type')->nullable()->collation('utf8mb4_general_ci');
            $table->enum('pulomnary_test', ['0', '1'])->default('0')->nullable()->collation('utf8mb4_general_ci');
            $table->string('volumn_predict')->nullable()->collation('utf8mb4_general_ci');
            $table->enum('dlco_test', ['0', '1'])->default('0')->nullable()->collation('utf8mb4_general_ci');
            $table->string('dlco_predict')->nullable()->collation('utf8mb4_general_ci');
            $table->enum('roomair_abg', ['0', '1'])->default('0')->nullable()->collation('utf8mb4_general_ci');
            $table->string('cd_level')->nullable()->collation('utf8mb4_general_ci');
            $table->string('oxy_level')->nullable()->collation('utf8mb4_general_ci');
            $table->string('home_oxy')->nullable()->collation('utf8mb4_general_ci');
            $table->enum('inhaled_therapy', ['0', '1','2'])->default('0')->nullable()->collation('utf8mb4_general_ci');
            $table->enum('sleep_apnea', ['0', '1','2'])->default('0')->nullable()->collation('utf8mb4_general_ci');
            $table->string('pneumonia')->nullable()->collation('utf8mb4_general_ci');
            $table->string('illicit_drug')->nullable()->collation('utf8mb4_general_ci');
            $table->enum('Depression', ['0', '1','2'])->default('0')->nullable()->collation('utf8mb4_general_ci');
            $table->string('alco_use')->nullable()->collation('utf8mb4_general_ci');
            $table->enum('liver_disease', ['0', '1','2'])->default('0')->nullable()->collation('utf8mb4_general_ci');
            $table->enum('immuno_present',['0', '1','2'])->default('0')->nullable()->collation('utf8mb4_general_ci');
            $table->enum('mediastinal', ['0', '1','2'])->default('0')->nullable()->collation('utf8mb4_general_ci');
            $table->enum('cancer_within', ['0', '1','2'])->default('0')->nullable()->collation('utf8mb4_general_ci');
            $table->string('peripheral_artery')->nullable()->collation('utf8mb4_general_ci');
            $table->enum('Thoracic_aorta', ['0', '1','2'])->default('0')->nullable()->collation('utf8mb4_general_ci');
            $table->enum('synocope',['0', '1','2'])->default('0')->nullable()->collation('utf8mb4_general_ci');
            $table->enum('unresponsive_state', ['0', '1','2'])->default('0')->nullable()->collation('utf8mb4_general_ci');
            $table->enum('cerebrovascular', ['0', '1','2'])->default('0')->nullable()->collation('utf8mb4_general_ci');
            $table->enum('priorcva', ['0', '1','2'])->default('0')->nullable()->collation('utf8mb4_general_ci');
            $table->string('priorcva_when')->nullable()->collation('utf8mb4_general_ci');
            $table->enum('cvdtia', ['0', '1','2'])->default('0')->nullable()->collation('utf8mb4_general_ci');
            $table->string('cvd_stenosis')->nullable()->collation('utf8mb4_general_ci');
            $table->string('stenosis_right')->nullable()->collation('utf8mb4_general_ci');
            $table->string('stanosis_left')->nullable()->collation('utf8mb4_general_ci');
            $table->integer('pre_carotid')->nullable()->collation('utf8mb4_general_ci');
            $table->integer('wbc_count')->nullable()->collation('utf8mb4_general_ci');
            $table->string('hemoglobin')->nullable()->collation('utf8mb4_general_ci');
            $table->string('hematocrit')->nullable()->collation('utf8mb4_general_ci');
            $table->integer('platelet_count')->nullable()->collation('utf8mb4_general_ci');
            $table->string('lst_creatine_lvl')->nullable()->collation('utf8mb4_general_ci');
            $table->integer('total_albumin')->nullable()->collation('utf8mb4_general_ci');
            $table->integer('total_bilirubin')->nullable()->collation('utf8mb4_general_ci');
            $table->string('aclevel')->nullable()->collation('utf8mb4_general_ci');
            $table->string('inr')->nullable()->collation('utf8mb4_general_ci');
            $table->integer('meld_score')->nullable()->collation('utf8mb4_general_ci');
            $table->string('bnp')->nullable()->collation('utf8mb4_general_ci');
            $table->string('high_sensitive',100)->nullable()->collation('utf8mb4_general_ci');
            $table->string('nterminal')->nullable()->collation('utf8mb4_general_ci');
            $table->string('highultra_sensitive')->nullable()->collation('utf8mb4_general_ci');
            $table->string('growth_diff')->nullable()->collation('utf8mb4_general_ci');
            $table->string('antibody')->nullable()->collation('utf8mb4_general_ci');
            $table->string('walkdone')->nullable()->collation('utf8mb4_general_ci');
            $table->integer('time1sec')->nullable()->collation('utf8mb4_general_ci');
            $table->integer('time2sec')->nullable()->collation('utf8mb4_general_ci');
            $table->integer('time3sec')->nullable()->collation('utf8mb4_general_ci');
            $table->string('rf_insertby',50)->collation('utf8mb4_general_ci');

            $table->timestamps();
        });
        DB::statement("ALTER TABLE risk_factors COLLATE utf8mb4_general_ci");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('risk_factors');
    }
};
