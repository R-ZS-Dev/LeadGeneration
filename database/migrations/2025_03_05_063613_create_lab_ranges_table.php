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
        Schema::create('lab_ranges', function (Blueprint $table) {
            $table->id('lrng_id');
            $table->integer('lab_id')->collation('utf8mb4_general_ci');
            $table->integer('lab_result')->collation('utf8mb4_general_ci');
            $table->enum('lrng_sex', ['Male', 'Female', 'Other'])->collation('utf8mb4_general_ci');
            $table->enum('is_child', ['0', '1'])->default('0')->collation('utf8mb4_general_ci');
            $table->string('lrng_source', 100)->collation('utf8mb4_general_ci');
            $table->string('lrng_temp', 50)->collation('utf8mb4_general_ci');
            $table->string('lrng_explow',10);
            $table->string('lrng_exphigh',10);
            $table->string('lrng_min', 10);
            $table->string('lrng_max', 10);
            $table->string('lrng_insertby', 40)->collation('utf8mb4_general_ci');
            $table->enum('close', ['0', '1'])->default('1')->collation('utf8mb4_general_ci');
            $table->enum('status', ['0', '1'])->default('1')->collation('utf8mb4_general_ci');
            $table->timestamps();

        });
        DB::statement("ALTER TABLE lab_ranges COLLATE utf8mb4_general_ci");

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lab_ranges');
    }
};
