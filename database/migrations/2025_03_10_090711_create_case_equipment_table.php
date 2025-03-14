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
        Schema::create('case_equipment', function (Blueprint $table) {
            $table->id('ce_id');
            $table->unsignedBigInteger('pet_id')->nullable();
            $table->unsignedBigInteger('e_group')->nullable();
            $table->unsignedBigInteger('e_configure')->nullable();
            $table->string('e_type')->nullable();

            $table->string('e_manufacturer', 100)->nullable()->collation('utf8mb4_general_ci');
            $table->string('e_name', 100)->nullable()->collation('utf8mb4_general_ci');
            $table->string('serial_number', 50)->nullable()->collation('utf8mb4_general_ci');
            $table->date('last_service_date')->nullable();
            $table->date('next_service_date')->nullable();
            $table->string('billing_code')->nullable()->collation('utf8mb4_general_ci');
            $table->text('note')->nullable()->collation('utf8mb4_general_ci');

            $table->string('ce_insertby', 50)->collation('utf8mb4_general_ci');
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
        Schema::dropIfExists('case_equipment');
    }
};
