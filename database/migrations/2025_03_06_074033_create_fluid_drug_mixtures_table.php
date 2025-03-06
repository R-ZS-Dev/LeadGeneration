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
        Schema::create('fluid_drug_mixtures', function (Blueprint $table) {
            $table->id('flm_id');

            $table->string('flm_name')->nullable()->collation('utf8mb4_general_ci');
            $table->string('flm_cname')->nullable()->collation('utf8mb4_general_ci');
            $table->text('flm_desc')->nullable()->collation('utf8mb4_general_ci');
            $table->string('flm_billcode', 15)->nullable()->collation('utf8mb4_general_ci');
            $table->string('flm_dname')->nullable()->collation('utf8mb4_general_ci');

            $table->unsignedBigInteger('flm_ftype')->nullable();
            $table->unsignedBigInteger('flm_ttype')->nullable();

            $table->string('flm_display')->nullable()->collation('utf8mb4_general_ci');
            $table->string('flm_amount', 15)->nullable()->collation('utf8mb4_general_ci');
            $table->enum('flm_quick', ['0', '1'])->default('1')->collation('utf8mb4_general_ci');
            $table->enum('flm_prime', ['0', '1'])->default('1')->collation('utf8mb4_general_ci');
            $table->enum('flm_cardioplegia', ['0', '1'])->default('1')->collation('utf8mb4_general_ci');
            $table->json('sort_order')->nullable();
            $table->json('amount')->nullable();
            $table->json('rowboxes')->nullable();
            $table->enum('flm_active', ['0', '1'])->default('1')->collation('utf8mb4_general_ci');

            $table->string('flm_insertby', 50)->collation('utf8mb4_general_ci');
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
        Schema::dropIfExists('fluid_drug_mixtures');
    }
};
