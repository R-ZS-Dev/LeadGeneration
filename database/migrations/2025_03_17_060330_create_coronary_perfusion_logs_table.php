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
        Schema::create('coronary_perfusion_logs', function (Blueprint $table) {
            $table->id('cpl_id');
            $table->integer('cpl_userid');
            $table->date('cpl_date')->nullable()->collation('utf8mb4_general_ci');
            $table->time('cpl_time')->nullable()->collation('utf8mb4_general_ci');
            $table->string('cpl_cpgtype')->collation('utf8mb4_general_ci'); // Required
            $table->integer('cpl_dose')->nullable()->collation('utf8mb4_general_ci');
            $table->decimal('cpl_temp', 5, 2)->nullable()->collation('utf8mb4_general_ci');
            $table->integer('transfusion_time')->nullable()->collation('utf8mb4_general_ci');
            $table->integer('ischemic_time')->nullable()->collation('utf8mb4_general_ci');
            $table->string('cpl_mixture', 20)->nullable()->collation('utf8mb4_general_ci');
            $table->integer('svgperfcount')->nullable()->collation('utf8mb4_general_ci');
            $table->string('cpl_note')->nullable()->collation('utf8mb4_general_ci');
            $table->string('cpl_insertby')->nullable()->collation('utf8mb4_general_ci');
            $table->enum('cpl_close',['0','1'])->default('1')->collation('utf8mb4_general_ci');
            $table->enum('cpl_status',['0','1'])->default('1')->collation('utf8mb4_general_ci');
            $table->timestamps();
        });

        DB::statement("ALTER TABLE coronary_perfusion_logs COLLATE utf8mb4_general_ci");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coronary_perfusion_logs');
    }
};
