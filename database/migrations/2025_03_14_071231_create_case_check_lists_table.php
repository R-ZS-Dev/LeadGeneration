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
        Schema::create('case_check_lists', function (Blueprint $table) {
            $table->id('ccl_id');
            $table->unsignedBigInteger('pat_id');
            $table->unsignedBigInteger('cl_id')->nullable();
            $table->unsignedBigInteger('cg_id')->nullable();
            $table->json('cl_items')->nullable();

            $table->string('cl_insertby', 50)->collation('utf8mb4_general_ci');
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
        Schema::dropIfExists('case_check_lists');
    }
};
