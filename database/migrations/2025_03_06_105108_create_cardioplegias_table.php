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
        Schema::create('cardioplegias', function (Blueprint $table) {
            $table->id('card_id');
            $table->string('card_name',100)->collation('utf8mb4_general_ci');
            $table->text('card_desc')->collation('utf8mb4_general_ci');
            $table->string('card_blood',5)->collation('utf8mb4_general_ci');
            $table->string('card_solution',5)->collation('utf8mb4_general_ci');
            $table->text('card_solcon')->nullable()->collation('utf8mb4_general_ci');
            $table->text('card_display')->nullable()->collation('utf8mb4_general_ci');
            $table->string('card_cpgtype')->nullable()->collation('utf8mb4_general_ci');
            $table->string('card_dose',5)->nullable()->collation('utf8mb4_general_ci');
            $table->string('card_temp',5)->nullable()->collation('utf8mb4_general_ci');
            $table->enum('card_active', ['0', '1'])->default('1')->collation('utf8mb4_general_ci');
            $table->enum('card_quick', ['0', '1'])->default('1')->collation('utf8mb4_general_ci');
            $table->string('card_insertby', 50)->collation('utf8mb4_general_ci');
            $table->enum('status', ['0', '1'])->default('1')->collation('utf8mb4_general_ci');
            $table->enum('close', ['0', '1'])->default('1')->collation('utf8mb4_general_ci');
            $table->timestamps();
        });
        DB::statement("ALTER TABLE cardioplegias COLLATE utf8mb4_general_ci");
    }

    public function down(): void
    {
        Schema::dropIfExists('cardioplegias');
    }
};
