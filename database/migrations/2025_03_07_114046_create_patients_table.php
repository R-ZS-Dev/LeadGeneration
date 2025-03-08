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
        Schema::create('patients', function (Blueprint $table) {
            $table->id('pat_id')->collation('utf8mb4_general_ci');
            $table->date('start_date')->collation('utf8mb4_general_ci');
            $table->time('start_time')->collation('utf8mb4_general_ci');
            $table->string('case_id',10)->nullable()->collation('utf8mb4_general_ci');
            $table->string('last_name',50)->nullable()->collation('utf8mb4_general_ci');
            $table->string('first_name',50)->nullable()->collation('utf8mb4_general_ci');
            $table->string('middle_name',50)->nullable()->collation('utf8mb4_general_ci');
            $table->string('medical_record',20)->nullable()->collation('utf8mb4_general_ci');
            $table->date('dob')->nullable()->collation('utf8mb4_general_ci');
            $table->integer('height')->nullable()->collation('utf8mb4_general_ci');
            $table->integer('weight')->nullable()->collation('utf8mb4_general_ci');
            $table->string('blood_type',5)->nullable()->collation('utf8mb4_general_ci');
            $table->date('admit_date')->nullable()->collation('utf8mb4_general_ci');
            $table->integer('hospital')->nullable()->collation('utf8mb4_general_ci');
            $table->string('room')->nullable()->collation('utf8mb4_general_ci');
            $table->enum('is_child', ['0', '1'])->default('0')->collation('utf8mb4_general_ci');
            $table->string('bmi',10)->nullable()->collation('utf8mb4_general_ci');
            $table->string('surface_area_method')->default('Dubois')->collation('utf8mb4_general_ci');
            $table->string('flow_rate',10)->default(2.4)->collation('utf8mb4_general_ci');
            $table->integer('heparin_dose')->default(300)->collation('utf8mb4_general_ci');
            $table->enum('sex', ['Male', 'Female'])->default('Male')->collation('utf8mb4_general_ci');
            $table->string('admit_source')->nullable()->collation('utf8mb4_general_ci');
            $table->date('discharge_date')->nullable()->collation('utf8mb4_general_ci');
            $table->string('pat_insertby', 50)->collation('utf8mb4_general_ci');
            $table->enum('status', ['0', '1'])->default('1')->collation('utf8mb4_general_ci');
            $table->enum('close', ['0', '1'])->default('1')->collation('utf8mb4_general_ci');
            $table->timestamps();
        });
        DB::statement("ALTER TABLE patients COLLATE utf8mb4_general_ci");

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
