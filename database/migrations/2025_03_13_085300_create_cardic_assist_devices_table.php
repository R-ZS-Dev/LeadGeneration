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
        Schema::create('cardic_assist_devices', function (Blueprint $table) {
            $table->id('cad_id');
            $table->unsignedBigInteger('pat_id');
            $table->enum('iab_pump', ['0', '1'])->default('1')->collation('utf8mb4_general_ci');
            $table->string('iabp_insertion', 20)->nullable()->collation('utf8mb4_general_ci');
            $table->string('iabp_reason', 50)->nullable()->collation('utf8mb4_general_ci');
            $table->enum('cbad_use', ['0', '1'])->default('1')->collation('utf8mb4_general_ci');
            $table->string('cbad_type', 10)->nullable()->collation('utf8mb4_general_ci');
            $table->string('cbad_inserted', 20)->nullable()->collation('utf8mb4_general_ci');
            $table->string('cbad_reason', 50)->nullable()->collation('utf8mb4_general_ci');
            $table->string('ecmo_sel', 50)->nullable()->collation('utf8mb4_general_ci');
            $table->string('ecmo_initiated', 10)->nullable()->collation('utf8mb4_general_ci');
            $table->string('ecmo_clinical', 50)->nullable()->collation('utf8mb4_general_ci');
            $table->enum('wpa_vad', ['0', '1'])->default('1')->collation('utf8mb4_general_ci');
            $table->enum('piaf_vad', ['0', '1'])->default('1')->collation('utf8mb4_general_ci');
            $table->date('vad_date_ins')->nullable()->collation('utf8mb4_general_ci');
            $table->string('vad_dev_model', 50)->nullable()->collation('utf8mb4_general_ci');
            $table->string('vad_udi', 50)->nullable()->collation('utf8mb4_general_ci');
            $table->string('vad_indication', 50)->nullable()->collation('utf8mb4_general_ci');
            $table->string('vad_type', 7)->nullable()->collation('utf8mb4_general_ci');
            $table->string('peda_vad', 50)->nullable()->collation('utf8mb4_general_ci');
            $table->string('vad_timing', 30)->nullable()->collation('utf8mb4_general_ci');
            $table->date('vad_date')->nullable()->collation('utf8mb4_general_ci');
            $table->enum('vadid_hos', ['0', '1'])->default('1')->collation('utf8mb4_general_ci');
            $table->text('vadidh_timing')->nullable()->collation('utf8mb4_general_ci');
            $table->string('vadidh_indication', 50)->nullable()->collation('utf8mb4_general_ci');
            $table->string('vadidh_type', 40)->nullable()->collation('utf8mb4_general_ci');
            $table->string('vadidh_device', 50)->nullable()->collation('utf8mb4_general_ci');
            $table->date('vadidh_initial_date')->nullable()->collation('utf8mb4_general_ci');
            $table->string('vadidh_udi', 50)->nullable()->collation('utf8mb4_general_ci');
            $table->string('vadidh_vad_exp', 50)->nullable()->collation('utf8mb4_general_ci');
            $table->string('vadidh_reason', 30)->nullable()->collation('utf8mb4_general_ci');
            $table->date('vadidh_date')->nullable()->collation('utf8mb4_general_ci');
            $table->enum('sec_di', ['0', '1'])->default('1')->collation('utf8mb4_general_ci');
            $table->text('sec_timing')->nullable()->collation('utf8mb4_general_ci');
            $table->string('sec_indication', 50)->nullable()->collation('utf8mb4_general_ci');
            $table->string('sec_type', 40)->nullable()->collation('utf8mb4_general_ci');
            $table->string('sec_device', 50)->nullable()->collation('utf8mb4_general_ci');
            $table->date('sec_implant_date')->nullable()->collation('utf8mb4_general_ci');
            $table->string('sec_udi', 50)->nullable()->collation('utf8mb4_general_ci');
            $table->string('sec_vad_expl', 50)->nullable()->collation('utf8mb4_general_ci');
            $table->string('sec_reason', 30)->nullable()->collation('utf8mb4_general_ci');
            $table->date('sec_date')->nullable()->collation('utf8mb4_general_ci');
            $table->enum('th_dev_imp', ['0', '1'])->default('1')->collation('utf8mb4_general_ci');
            $table->text('th_timing')->nullable()->collation('utf8mb4_general_ci');
            $table->string('th_indication', 50)->nullable()->collation('utf8mb4_general_ci');
            $table->string('th_type', 40)->nullable()->collation('utf8mb4_general_ci');
            $table->string('th_device', 50)->nullable()->collation('utf8mb4_general_ci');
            $table->date('th_implant_date')->nullable()->collation('utf8mb4_general_ci');
            $table->string('th_udi', 50)->nullable()->collation('utf8mb4_general_ci');
            $table->string('th_vad_expla', 50)->nullable()->collation('utf8mb4_general_ci');
            $table->string('th_reason', 30)->nullable()->collation('utf8mb4_general_ci');
            $table->date('th_date')->nullable()->collation('utf8mb4_general_ci');
            $table->string('crma_dev', 30)->nullable()->collation('utf8mb4_general_ci');
            $table->string('first_complication', 50)->nullable()->collation('utf8mb4_general_ci');
            $table->string('second_complication', 50)->nullable()->collation('utf8mb4_general_ci');
            $table->string('third_complication', 50)->nullable()->collation('utf8mb4_general_ci');
            $table->string('cad_insertby', 50)->collation('utf8mb4_general_ci');
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
        Schema::dropIfExists('cardic_assist_devices');
    }
};
