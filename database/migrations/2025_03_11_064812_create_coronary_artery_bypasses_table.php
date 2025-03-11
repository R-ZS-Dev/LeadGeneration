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
        Schema::create('coronary_artery_bypasses', function (Blueprint $table) {
            $table->id('cab_id');
            $table->unsignedBigInteger('pet_id');

            $table->string('cab_arterial')->collation('utf8mb4_general_ci');
            $table->string('cab_venous')->nullable()->collation('utf8mb4_general_ci');
            $table->string('cab_htechniques')->nullable()->collation('utf8mb4_general_ci');
            $table->time('cab_htime')->nullable()->collation('utf8mb4_general_ci');
            $table->string('cab_ima_options')->nullable()->collation('utf8mb4_general_ci');
            $table->string('cab_ima_anastomoses')->nullable()->collation('utf8mb4_general_ci');
            $table->string('cab_ima_htechniques')->nullable()->collation('utf8mb4_general_ci');
            $table->string('cab_ima_preson')->nullable()->collation('utf8mb4_general_ci');
            $table->string('cab_radial_arteries')->nullable()->collation('utf8mb4_general_ci');
            $table->string('cab_radial_distal')->nullable()->collation('utf8mb4_general_ci');
            $table->time('cab_radial_time')->nullable()->collation('utf8mb4_general_ci');
            $table->string('cab_distal_hanastomoses')->nullable()->collation('utf8mb4_general_ci');
            $table->string('cab_distal_anastomoses')->nullable()->collation('utf8mb4_general_ci');
            $table->string('cab_proximal')->nullable()->collation('utf8mb4_general_ci');
            $table->string('cab_ins_distal')->nullable()->collation('utf8mb4_general_ci');
            $table->string('cab_ins_proximal')->nullable()->collation('utf8mb4_general_ci');
            $table->string('cab_ins_conduit')->nullable()->collation('utf8mb4_general_ci');
            $table->enum('cab_ins_position', ['0', '1'])->default('1')->collation('utf8mb4_general_ci');
            $table->enum('cab_ins_end', ['0', '1'])->default('1')->collation('utf8mb4_general_ci');

            $table->text('note')->nullable()->collation('utf8mb4_general_ci');
            $table->string('cab_insertby', 50)->collation('utf8mb4_general_ci');
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
        Schema::dropIfExists('coronary_artery_bypasses');
    }
};
