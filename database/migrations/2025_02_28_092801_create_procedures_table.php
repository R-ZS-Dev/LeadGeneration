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
        Schema::create('procedures', function (Blueprint $table) {
            $table->id('pro_id');
            $table->text('pro_name')->collation('utf8mb4_general_ci');
            $table->integer('pro_cptcode')->nullable()->collation('utf8mb4_general_ci');
            $table->text('pro_display')->nullable()->collation('utf8mb4_general_ci');
            $table->text('pro_desc')->nullable()->collation('utf8mb4_general_ci');
            $table->enum('pro_active',['0', '1'])->default('0')->collation('utf8mb4_general_ci');
            $table->string('pro_insertby',40)->collation('utf8mb4_general_ci');
            $table->enum('close', ['0', '1'])->default('1')->collation('utf8mb4_general_ci');
            $table->enum('status', ['0', '1'])->default('1')->collation('utf8mb4_general_ci');
            $table->timestamps();
        });
        DB::statement("ALTER TABLE procedures COLLATE utf8mb4_general_ci");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('procedures');
    }
};
