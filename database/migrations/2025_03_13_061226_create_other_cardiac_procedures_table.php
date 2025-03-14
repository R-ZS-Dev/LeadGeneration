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
        Schema::create('other_cardiac_procedures', function (Blueprint $table) {
            $table->id('ocp_id');
            $table->unsignedBigInteger('pat_id');

            $table->enum('afib_el', ['0', '1'])->default('1')->collation('utf8mb4_general_ci');
            $table->enum('asd_pfo', ['0', '1'])->default('1')->collation('utf8mb4_general_ci');
            $table->string('aap_raa', 5)->nullable()->collation('utf8mb4_general_ci');
            $table->text('arr_dev_sur')->nullable()->collation('utf8mb4_general_ci');
            $table->enum('lead_in', ['0', '1'])->default('1')->collation('utf8mb4_general_ci');
            $table->enum('msc_therapy', ['0', '1'])->default('1')->collation('utf8mb4_general_ci');
            $table->enum('tl_rev', ['0', '1'])->default('1')->collation('utf8mb4_general_ci');
            $table->enum('afib_il', ['0', '1'])->default('1')->collation('utf8mb4_general_ci');
            $table->enum('asd_sv', ['0', '1'])->default('1')->collation('utf8mb4_general_ci');
            $table->text('arr_correction_ext')->nullable()->collation('utf8mb4_general_ci');
            $table->enum('lva', ['0', '1'])->default('1')->collation('utf8mb4_general_ci');
            $table->string('pt_acute', 15)->default('1')->collation('utf8mb4_general_ci');
            $table->enum('ss_res', ['0', '1'])->default('1')->collation('utf8mb4_general_ci');
            $table->string('ssr_type')->nullable()->collation('utf8mb4_general_ci');
            $table->enum('sv_res', ['0', '1'])->default('1')->collation('utf8mb4_general_ci');
            $table->string('tumor_select', 50)->nullable()->collation('utf8mb4_general_ci');
            $table->enum('card_tx', ['0', '1'])->default('1')->collation('utf8mb4_general_ci');
            $table->enum('cardiac_t', ['0', '1'])->default('1')->collation('utf8mb4_general_ci');
            $table->enum('p_congenital', ['0', '1'])->default('1')->collation('utf8mb4_general_ci');
            $table->enum('p_other', ['0', '1'])->default('1')->collation('utf8mb4_general_ci');
            $table->string('vsd_con', 25)->nullable()->collation('utf8mb4_general_ci');

            $table->string('ocp_insertby', 50)->collation('utf8mb4_general_ci');
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
        Schema::dropIfExists('other_cardiac_procedures');
    }
};
