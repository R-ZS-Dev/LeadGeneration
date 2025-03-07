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
        Schema::create('live_line', function (Blueprint $table) {
            $table->id('ll_id');
            $table->string('ll_gname',100)->collation('utf8mb4_general_ci');
            $table->string('ll_label',50)->collation('utf8mb4_general_ci');
            $table->integer('ll_displayorder')->collation('utf8mb4_general_ci');
            $table->integer('ll_removetime')->collation('utf8mb4_general_ci');
            $table->integer('ll_showremind')->collation('utf8mb4_general_ci');
            $table->enum('ll_manuallog', ['0', '1'])->default('0')->collation('utf8mb4_general_ci');
            $table->enum('ll_pumpoff', ['0', '1'])->default('0')->collation('utf8mb4_general_ci');
            $table->enum('ll_linechart', ['0', '1'])->default('0')->collation('utf8mb4_general_ci');
            $table->enum('ll_skip', ['0', '1'])->default('0')->collation('utf8mb4_general_ci');
            $table->string('ll_highlimit',40)->collation('utf8mb4_general_ci');
            $table->string('ll_highcritical',40)->collation('utf8mb4_general_ci');
            $table->string('ll_highwarn',40)->collation('utf8mb4_general_ci');
            $table->string('ll_goodfrom',10)->collation('utf8mb4_general_ci');
            $table->string('ll_goodto',10)->collation('utf8mb4_general_ci');
            $table->string('ll_lowlimit',40)->collation('utf8mb4_general_ci');
            $table->string('ll_lowcritical',40)->collation('utf8mb4_general_ci');
            $table->string('ll_lowwarn',40)->collation('utf8mb4_general_ci');
            $table->enum('ll_active', ['0', '1'])->default('1')->collation('utf8mb4_general_ci');
            $table->string('ll_insertby', 50)->collation('utf8mb4_general_ci');
            $table->enum('status', ['0', '1'])->default('1')->collation('utf8mb4_general_ci');
            $table->enum('close', ['0', '1'])->default('1')->collation('utf8mb4_general_ci');
            $table->timestamps();
        });
        DB::statement("ALTER TABLE live_line COLLATE utf8mb4_general_ci");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('live_line');
    }
};
