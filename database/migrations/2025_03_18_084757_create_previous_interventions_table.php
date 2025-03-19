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
        Schema::create('previous_interventions', function (Blueprint $table) {
            $table->id('pi_id');
            $table->unsignedBigInteger('pat_id');
            $table->unsignedBigInteger('pcv_in')->nullable();
            $table->unsignedBigInteger('pcab')->nullable();
            $table->unsignedBigInteger('pv_pro')->nullable();
            $table->text('pre_pro_1')->nullable()->collation('utf8mb4_general_ci');
            $table->text('pre_pro_2')->nullable()->collation('utf8mb4_general_ci');
            $table->text('pre_pro_3')->nullable()->collation('utf8mb4_general_ci');
            $table->text('pre_pro_4')->nullable()->collation('utf8mb4_general_ci');
            $table->text('pre_pro_5')->nullable()->collation('utf8mb4_general_ci');
            $table->unsignedBigInteger('ppc_i')->nullable();
            $table->unsignedBigInteger('pci_care')->nullable();
            $table->text('ind_sur')->nullable()->collation('utf8mb4_general_ci');
            $table->unsignedBigInteger('pci_s')->nullable();
            $table->unsignedBigInteger('stype_id')->nullable();
            $table->string('pci_interval', 25)->nullable()->collation('utf8mb4_general_ci');
            $table->unsignedBigInteger('opci')->nullable();
            $table->text('intervention_1')->nullable()->collation('utf8mb4_general_ci');
            $table->text('intervention_2')->nullable()->collation('utf8mb4_general_ci');
            $table->text('intervention_3')->nullable()->collation('utf8mb4_general_ci');
            $table->text('intervention_4')->nullable()->collation('utf8mb4_general_ci');
            $table->text('intervention_5')->nullable()->collation('utf8mb4_general_ci');
            $table->text('intervention_6')->nullable()->collation('utf8mb4_general_ci');
            $table->text('intervention_7')->nullable()->collation('utf8mb4_general_ci');
            
            $table->string('pi_insertby', 50)->collation('utf8mb4_general_ci');
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
        Schema::dropIfExists('previous_interventions');
    }
};
