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
        Schema::create('case_general_events', function (Blueprint $table) {
            $table->id('cge_id');
            $table->unsignedBigInteger('pat_id');
            $table->date('cge_date')->nullable()->collation('utf8mb4_general_ci');
            $table->time('cge_time')->nullable()->collation('utf8mb4_general_ci');
            $table->unsignedBigInteger('cge_note')->nullable();

            $table->string('cge_insertby', 50)->collation('utf8mb4_general_ci');
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
        Schema::dropIfExists('case_general_events');
    }
};
