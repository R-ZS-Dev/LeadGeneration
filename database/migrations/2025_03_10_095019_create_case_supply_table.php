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
        Schema::create('case_supply', function (Blueprint $table) {
            $table->id('csu_id');
            $table->unsignedBigInteger('pet_id')->nullable();
            $table->unsignedBigInteger('csu_group')->nullable();

            $table->string('csu_type', 255)->nullable()->collation('utf8mb4_general_ci');
            $table->string('csu_manufacturer', 255)->nullable()->collation('utf8mb4_general_ci');
            $table->string('csu_name', 100)->nullable()->collation('utf8mb4_general_ci');
            $table->string('csu_lot_number', 50)->nullable()->collation('utf8mb4_general_ci');
            $table->date('csu_ex_date')->nullable();
            $table->string('csu_billing_code')->nullable()->collation('utf8mb4_general_ci');
            $table->string('csu_number_used')->nullable()->collation('utf8mb4_general_ci');
            $table->text('csu_note')->nullable()->collation('utf8mb4_general_ci');

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
        Schema::dropIfExists('case_supply');
    }
};
