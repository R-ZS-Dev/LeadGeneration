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
        Schema::create('case_procedure', function (Blueprint $table) {
            $table->id('casep_id');
            $table->unsignedBigInteger('pet_id')->nullable()->collation('utf8mb4_general_ci');
            $table->string('pro_casetype')->nullable()->collation('utf8mb4_general_ci');
            $table->text('pro_casedesc')->nullable()->collation('utf8mb4_general_ci');
            $table->text('pro_approach')->nullable()->collation('utf8mb4_general_ci');
            $table->text('approach_type')->nullable()->collation('utf8mb4_general_ci');
            $table->text('robot_use')->nullable()->collation('utf8mb4_general_ci');
            $table->text('robot_useop')->nullable()->collation('utf8mb4_general_ci');
            $table->text('pro_coroart')->nullable()->collation('utf8mb4_general_ci');
            $table->text('valve_surgery')->nullable()->collation('utf8mb4_general_ci');
            $table->text('vad_implant')->nullable()->collation('utf8mb4_general_ci');
            $table->text('other_cardiac')->nullable()->collation('utf8mb4_general_ci');
            $table->text('cardiac_fib')->nullable()->collation('utf8mb4_general_ci');
            $table->text('aortic_proce')->nullable()->collation('utf8mb4_general_ci');
            $table->text('non_cardic')->nullable()->collation('utf8mb4_general_ci');

            // CPT Codes
            for ($i = 1; $i <= 10; $i++) {
                $table->string("cptcode{$i}")->nullable()->collation('utf8mb4_general_ci');
            }

            // Date & Time fields
            $table->date('orentrydate')->nullable()->collation('utf8mb4_general_ci');
            $table->time('orentrytime')->nullable()->collation('utf8mb4_general_ci');
            $table->date('orexitdate')->nullable()->collation('utf8mb4_general_ci');
            $table->time('orexittime')->nullable()->collation('utf8mb4_general_ci');
            $table->date('initalintubedate')->nullable()->collation('utf8mb4_general_ci');
            $table->time('initalintubetime')->nullable()->collation('utf8mb4_general_ci');
            $table->date('initalextubedate')->nullable()->collation('utf8mb4_general_ci');
            $table->time('initalextubetime')->nullable()->collation('utf8mb4_general_ci');
            $table->date('skinstrtdate')->nullable()->collation('utf8mb4_general_ci');
            $table->time('skinstrttime')->nullable()->collation('utf8mb4_general_ci');
            $table->date('skinenddate')->nullable()->collation('utf8mb4_general_ci');
            $table->time('skinendtime')->nullable()->collation('utf8mb4_general_ci');
            $table->date('anesthesiadate')->nullable()->collation('utf8mb4_general_ci');
            $table->time('anesthesiatime')->nullable()->collation('utf8mb4_general_ci');

            // Antibiotic fields
            $table->text('antibiotic')->nullable()->collation('utf8mb4_general_ci');
            $table->text('antiadmin')->nullable()->collation('utf8mb4_general_ci');
            $table->text('antidiscon')->nullable()->collation('utf8mb4_general_ci');
            $table->text('addintra')->nullable()->collation('utf8mb4_general_ci');

            // Temperature & Hemoglobin
            $table->text('low_temp')->nullable()->collation('utf8mb4_general_ci');
            $table->text('temp_source')->nullable()->collation('utf8mb4_general_ci');
            $table->text('low_hemo')->nullable()->collation('utf8mb4_general_ci');
            $table->text('low_hema')->nullable()->collation('utf8mb4_general_ci');
            $table->text('high_gluco')->nullable()->collation('utf8mb4_general_ci');

            // CPB & Cannulation
            $table->text('cpb_utilize')->nullable()->collation('utf8mb4_general_ci');
            $table->text('unplan_reason')->nullable()->collation('utf8mb4_general_ci');
            $table->text('cannulation')->nullable()->collation('utf8mb4_general_ci');
            $table->text('cannul_femo')->nullable()->collation('utf8mb4_general_ci');
            $table->text('cannul_axil')->nullable()->collation('utf8mb4_general_ci');
            $table->text('cannul_inno')->nullable()->collation('utf8mb4_general_ci');
            $table->text('cannul_other')->nullable()->collation('utf8mb4_general_ci');
            $table->text('venous_femo')->nullable()->collation('utf8mb4_general_ci');
            $table->text('venous_jugular')->nullable()->collation('utf8mb4_general_ci');
            $table->text('veno_right_artial')->nullable()->collation('utf8mb4_general_ci');
            $table->text('veno_left_artial')->nullable()->collation('utf8mb4_general_ci');
            $table->text('veno_pulmu')->nullable()->collation('utf8mb4_general_ci');
            $table->text('veno_cav')->nullable()->collation('utf8mb4_general_ci');
            $table->text('veno_other')->nullable()->collation('utf8mb4_general_ci');

            // Circulatory arrest
            $table->text('bypass_time')->nullable()->collation('utf8mb4_general_ci');
            $table->text('circular_arrest')->nullable()->collation('utf8mb4_general_ci');
            $table->text('arrest_without_cerebral')->nullable()->collation('utf8mb4_general_ci');
            $table->text('arrest_with_cerebral')->nullable()->collation('utf8mb4_general_ci');
            $table->text('cerebral_perfus_time')->nullable()->collation('utf8mb4_general_ci');
            $table->text('cerebral_perfus_type')->nullable()->collation('utf8mb4_general_ci');
            $table->text('circulat_arrest')->nullable()->collation('utf8mb4_general_ci');
            $table->text('aortic_occl')->nullable()->collation('utf8mb4_general_ci');
            $table->text('cross_clamp')->nullable()->collation('utf8mb4_general_ci');
            $table->text('cardio_deliver')->nullable()->collation('utf8mb4_general_ci');
            $table->text('type_of_cardio')->nullable()->collation('utf8mb4_general_ci');

            // Aortic & Alterations
            $table->text('oximetry')->nullable()->collation('utf8mb4_general_ci');
            $table->text('diffuse_aort')->nullable()->collation('utf8mb4_general_ci');
            $table->text('ascending')->nullable()->collation('utf8mb4_general_ci');
            $table->text('assess_aorta_disease')->nullable()->collation('utf8mb4_general_ci');
            $table->text('alterplan')->nullable()->collation('utf8mb4_general_ci');
            $table->text('intraop')->nullable()->collation('utf8mb4_general_ci');
            $table->text('intraoppro')->nullable()->collation('utf8mb4_general_ci');

            // Blood transfusion
            $table->text('red_blood_cell')->nullable()->collation('utf8mb4_general_ci');
            $table->text('fresh_frozen')->nullable()->collation('utf8mb4_general_ci');
            $table->text('platelet_unit')->nullable()->collation('utf8mb4_general_ci');
            $table->text('crypo_unit')->nullable()->collation('utf8mb4_general_ci');
            $table->text('clothing_factor')->nullable()->collation('utf8mb4_general_ci');
            $table->text('intraop_antifi')->nullable()->collation('utf8mb4_general_ci');
            $table->text('intraop_tee')->nullable()->collation('utf8mb4_general_ci');

            // Cardiac & PCI
            $table->text('aortic_insufi')->nullable()->collation('utf8mb4_general_ci');
            $table->text('mitral_insufi')->nullable()->collation('utf8mb4_general_ci');
            $table->text('tricuspid_insufi')->nullable()->collation('utf8mb4_general_ci');
            $table->text('ejection_fract')->nullable()->collation('utf8mb4_general_ci');
            $table->text('cardiac_pci')->nullable()->collation('utf8mb4_general_ci');
            $table->text('combine_pro')->nullable()->collation('utf8mb4_general_ci');
            $table->text('proced_status')->nullable()->collation('utf8mb4_general_ci');
            $table->text('pci_procedure')->nullable()->collation('utf8mb4_general_ci');
            $table->string('stent_type')->nullable()->collation('utf8mb4_general_ci');

            // User & Status
            $table->string('casep_insertby', 50)->collation('utf8mb4_general_ci');
            $table->enum('status', ['0', '1'])->default('1');
            $table->enum('close', ['0', '1'])->default('1');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('case_procedure');
    }
};
