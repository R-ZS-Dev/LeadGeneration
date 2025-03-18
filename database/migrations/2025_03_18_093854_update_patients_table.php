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
        Schema::table('patients', function (Blueprint $table) {
            $table->enum('myocardial', ['0', '1'])->default('0')->nullable()->collation('utf8mb4_general_ci');
            $table->string('mi_when',50)->nullable()->collation('utf8mb4_general_ci');
            $table->string('cardic_sympadmin',50)->nullable()->collation('utf8mb4_general_ci');
            $table->string('cardic_sympsurg',50)->nullable()->collation('utf8mb4_general_ci');
            $table->string('anginal_class',25)->nullable()->collation('utf8mb4_general_ci');
            $table->enum('heartfail2w', ['0', '1'])->default('0')->nullable()->collation('utf8mb4_general_ci');
            $table->string('class_nyha',15)->nullable()->collation('utf8mb4_general_ci');
            $table->enum('priorheartf', ['0', '1', '2'])->default('0')->nullable()->collation('utf8mb4_general_ci');
            $table->text('cardio_shock')->nullable()->collation('utf8mb4_general_ci');
            $table->text('resuscit')->nullable()->collation('utf8mb4_general_ci');
            $table->enum('arrhythmia', ['0', '1'])->default('0')->nullable()->collation('utf8mb4_general_ci');
            $table->string('vtachfib',20)->nullable()->collation('utf8mb4_general_ci');
            $table->string('sick_sinus',20)->nullable()->collation('utf8mb4_general_ci');
            $table->string('aflutter',20)->nullable()->collation('utf8mb4_general_ci');
            $table->string('sec_heartblock',20)->nullable()->collation('utf8mb4_general_ci');
            $table->string('third_heartblock',20)->nullable()->collation('utf8mb4_general_ci');
            $table->enum('paced_rhythm', ['0', '1'])->default('0')->nullable()->collation('utf8mb4_general_ci');
            $table->string('atrialfib')->nullable()->collation('utf8mb4_general_ci');
            $table->string('fib_durate')->nullable()->collation('utf8mb4_general_ci');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('patients', function (Blueprint $table) {
            $table->dropColumn([
                'myocardial', 'mi_when', 'cardic_sympadmin', 'cardic_sympsurg', 'anginal_class', 'heartfail2w',
                'class_nyha', 'priorheartf', 'cardio_shock', 'resuscit', 'arrhythmia', 'vtachfib', 'sick_sinus',
                'aflutter', 'sec_heartblock', 'third_heartblock', 'paced_rhythm', 'atrialfib', 'fib_durate'
            ]);
        });
    }
};
