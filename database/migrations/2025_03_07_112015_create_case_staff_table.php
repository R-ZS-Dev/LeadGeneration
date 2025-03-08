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
        Schema::create('case_staff', function (Blueprint $table) {
            $table->id('cs_id');
            $table->unsignedBigInteger('pet_id')->nullable();
            $table->unsignedBigInteger('surgeon')->nullable();
            $table->unsignedBigInteger('second_surgeon')->nullable();
            $table->unsignedBigInteger('pa_first_assistant')->nullable();
            $table->unsignedBigInteger('anesthesiologist')->nullable();
            $table->unsignedBigInteger('crna_res')->nullable();
            $table->unsignedBigInteger('cardiologist')->nullable();
            $table->unsignedBigInteger('family_md')->nullable();
            $table->unsignedBigInteger('perfusionist')->nullable();
            $table->text('perfusionist_category')->nullable()->collation('utf8mb4_general_ci');
            $table->unsignedBigInteger('perfusionist_status')->nullable();
            $table->unsignedBigInteger('second_perfusionist')->nullable();
            $table->text('second_perfusionist_category')->nullable()->collation('utf8mb4_general_ci');
            $table->string('cs_insertby', 50)->collation('utf8mb4_general_ci');
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
        Schema::dropIfExists('case_staff');
    }
};
