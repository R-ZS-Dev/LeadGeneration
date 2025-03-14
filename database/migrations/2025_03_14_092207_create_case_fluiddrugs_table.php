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
        Schema::create('case_fluiddrugs', function (Blueprint $table) {
            $table->id('cfluid_id');
            $table->integer('cfuild_userid');
            $table->string('cfuild_drugname')->collation('utf8mb4_general_ci');
            $table->date('cfluid_date')->collation('utf8mb4_general_ci');
            $table->time('cfluid_time')->collation('utf8mb4_general_ci');
            $table->integer('cfluid_drug')->collation('utf8mb4_general_ci');
            $table->enum('cfluid_prime', ['0', '1'])->default('0')->collation('utf8mb4_general_ci');
            $table->enum('cfluid_card', ['0', '1'])->default('0')->collation('utf8mb4_general_ci');
            $table->string('cfluid_amount', 255)->collation('utf8mb4_general_ci');
            $table->string('cfluid_concentper', 255)->collation('utf8mb4_general_ci');
            $table->string('cfluid_concentml', 255)->collation('utf8mb4_general_ci');
            $table->string('cfluid_lot', 255)->collation('utf8mb4_general_ci');
            $table->date('cfluid_exp');
            $table->string('cfluid_billcode', 255)->collation('utf8mb4_general_ci');
            $table->integer('cfluid_billamnt')->collation('utf8mb4_general_ci');
            $table->integer('fd_from')->collation('utf8mb4_general_ci');
            $table->integer('fd_to')->collation('utf8mb4_general_ci');
            $table->text('cfluid_note')->collation('utf8mb4_general_ci');
            $table->string('cfluid_insertby')->collation('utf8mb4_general_ci');
            $table->timestamps();
        });
        DB::statement("ALTER TABLE case_fluiddrugs COLLATE utf8mb4_general_ci");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('case_fluiddrugs');
    }
};
