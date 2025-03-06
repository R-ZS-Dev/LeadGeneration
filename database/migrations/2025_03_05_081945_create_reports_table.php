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
        Schema::create('reports', function (Blueprint $table) {
            $table->id('rep_id');
            $table->integer('rep_userid')->nullable()->collation('utf8mb4_general_ci');
            $table->string('report_name', 100)->collation('utf8mb4_general_ci');
            $table->text('rep_address1')->collation('utf8mb4_general_ci');
            $table->text('rep_address2')->nullable()->collation('utf8mb4_general_ci');
            $table->text('rep_headimage')->collation('utf8mb4_general_ci');
            $table->text('rep_footimage')->collation('utf8mb4_general_ci');
            $table->enum('rep_active', ['0', '1'])->default('1')->collation('utf8mb4_general_ci');
            $table->string('rr_insertby', 50)->collation('utf8mb4_general_ci');
            $table->enum('status', ['0', '1'])->default('1')->collation('utf8mb4_general_ci');
            $table->enum('close', ['0', '1'])->default('1')->collation('utf8mb4_general_ci');
            $table->timestamps();
        });
        DB::statement("ALTER TABLE reports COLLATE utf8mb4_general_ci");

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};
