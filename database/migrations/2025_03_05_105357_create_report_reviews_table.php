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
        Schema::create('report_reviews', function (Blueprint $table) {
            $table->id('rr_id');
            $table->integer('report_type')->nullable()->collation('utf8mb4_general_ci');
            $table->string('rr_name', 100)->collation('utf8mb4_general_ci');
            $table->text('rr_desc')->collation('utf8mb4_general_ci');
            $table->enum('rr_active', ['0', '1'])->default('1')->collation('utf8mb4_general_ci');
            $table->string('rr_insertby', 40)->collation('utf8mb4_general_ci');
            $table->enum('status', ['0', '1'])->default('1')->collation('utf8mb4_general_ci');
            $table->enum('close', ['0', '1'])->default('1')->collation('utf8mb4_general_ci');
            $table->timestamps();
        });
        DB::statement("ALTER TABLE report_reviews COLLATE utf8mb4_general_ci");

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('report_reviews');
    }
};
