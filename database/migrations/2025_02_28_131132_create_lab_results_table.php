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
        Schema::create('lab_results', function (Blueprint $table) {
            $table->id('lr_id');
            $table->text('lr_name')->collation('utf8mb4_general_ci');
            $table->string('lr_abbrivat',10)->collation('utf8mb4_general_ci');
            $table->string('unit_of_measure',15)->collation('utf8mb4_general_ci');
            $table->enum('show_unit', ['0', '1'])->default('0')->collation('utf8mb4_general_ci');
            $table->text('lr_desc')->nullable()->collation('utf8mb4_general_ci');
            $table->string('expected_low',10)->nullable()->collation('utf8mb4_general_ci');
            $table->string('expected_high',10)->nullable()->collation('utf8mb4_general_ci');
            $table->string('maximum',10)->nullable()->collation('utf8mb4_general_ci');
            $table->string('high_critical',10)->nullable()->collation('utf8mb4_general_ci');
            $table->string('high_warn',10)->nullable()->collation('utf8mb4_general_ci');
            $table->string('lr_rangefrom',10)->nullable()->collation('utf8mb4_general_ci');
            $table->string('lr_rangeto',10)->nullable()->collation('utf8mb4_general_ci');
            $table->string('minimum',10)->nullable()->collation('utf8mb4_general_ci');
            $table->string('low_critical',10)->nullable()->collation('utf8mb4_general_ci');
            $table->string('low_warn',10)->nullable()->collation('utf8mb4_general_ci');
            $table->enum('lr_active',['0', '1'])->default('0')->collation('utf8mb4_general_ci');
            $table->string('lr_insertby',40)->collation('utf8mb4_general_ci');
            $table->enum('close', ['0', '1'])->default('1')->collation('utf8mb4_general_ci');
            $table->enum('status', ['0', '1'])->default('1')->collation('utf8mb4_general_ci');
            $table->timestamps();
        });
        DB::statement("ALTER TABLE lab_results COLLATE utf8mb4_general_ci");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lab_results');
    }
};
