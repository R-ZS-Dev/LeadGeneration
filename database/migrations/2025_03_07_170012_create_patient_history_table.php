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
        Schema::create('patient_history', function (Blueprint $table) {
            $table->id('ph_id');
            $table->integer('ph_userid')->collation('utf8mb4_general_ci');
            $table->text('ph_medicalsum')->nullable()->collation('utf8mb4_general_ci');
            $table->text('ph_diagnosis')->nullable()->collation('utf8mb4_general_ci');
            $table->text('ph_allergies')->nullable()->collation('utf8mb4_general_ci');
            $table->string('ph_insertby', 50)->collation('utf8mb4_general_ci');
            $table->enum('status', ['0', '1'])->default('1')->collation('utf8mb4_general_ci');
            $table->enum('close', ['0', '1'])->default('1')->collation('utf8mb4_general_ci');
            $table->timestamps();
        });
        DB::statement("ALTER TABLE patient_history COLLATE utf8mb4_general_ci");

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patient_history');
    }
};
