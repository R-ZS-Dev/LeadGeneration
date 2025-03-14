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
        Schema::create('atrial_fibrillations', function (Blueprint $table) {
            $table->id('af_id');
            $table->unsignedBigInteger('pat_id');

            $table->string('epicardial_radio', 30)->nullable()->collation('utf8mb4_general_ci');
            $table->enum('mlc_doc', ['0', '1'])->default('1')->collation('utf8mb4_general_ci');
            $table->enum('radio_frequency', ['0', '1'])->default('1')->collation('utf8mb4_general_ci');
            $table->enum('rf_bipolar', ['0', '1'])->default('1')->collation('utf8mb4_general_ci');
            $table->enum('cut_sew', ['0', '1'])->default('1')->collation('utf8mb4_general_ci');
            $table->enum('cryo', ['0', '1'])->default('1')->collation('utf8mb4_general_ci');
            $table->json('procedures')->nullable();

            $table->string('af_insertby', 50)->collation('utf8mb4_general_ci');
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
        Schema::dropIfExists('atrial_fibrillations');
    }
};
