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
        Schema::create('fluid_drugs', function (Blueprint $table) {
            $table->id('fd_id');
            $table->text('fd_gname')->collation('utf8mb4_general_ci');
            $table->text('fd_cname')->collation('utf8mb4_general_ci');
            $table->text('fd_desc')->collation('utf8mb4_general_ci');
            $table->string('fd_billcode')->collation('utf8mb4_general_ci');
            $table->string('fd_billamount')->collation('utf8mb4_general_ci');
            $table->string('fd_units',5)->collation('utf8mb4_general_ci');
            $table->string('fd_confrom',10)->collation('utf8mb4_general_ci');
            $table->string('fd_conto',10)->collation('utf8mb4_general_ci');
            $table->text('fd_defaultnote')->collation('utf8mb4_general_ci');
            $table->string('fd_from',50)->collation('utf8mb4_general_ci');
            $table->string('fd_to',50)->collation('utf8mb4_general_ci');
            $table->enum('fd_prime', ['0', '1'])->default('0')->collation('utf8mb4_general_ci');
            $table->enum('fd_drug', ['0', '1'])->default('0')->collation('utf8mb4_general_ci');
            $table->enum('fd_amountforunit', ['0', '1'])->default('0')->collation('utf8mb4_general_ci');
            $table->enum('fd_cardioplegia', ['0', '1'])->default('0')->collation('utf8mb4_general_ci');
            $table->enum('fd_blood', ['0', '1'])->default('0')->collation('utf8mb4_general_ci');
            $table->string('fd_hematocrit')->nullable()->collation('utf8mb4_general_ci');
            $table->text('fd_display')->nullable()->collation('utf8mb4_general_ci');
            $table->string('fd_amount',15)->nullable()->collation('utf8mb4_general_ci');
            $table->enum('fd_active', ['0', '1'])->default('1')->collation('utf8mb4_general_ci');
            $table->enum('fd_quick', ['0', '1'])->default('1')->collation('utf8mb4_general_ci');
            $table->string('fd_insertby', 50)->collation('utf8mb4_general_ci');
            $table->enum('status', ['0', '1'])->default('1')->collation('utf8mb4_general_ci');
            $table->enum('close', ['0', '1'])->default('1')->collation('utf8mb4_general_ci');
            $table->timestamps();
        });
        DB::statement("ALTER TABLE fluid_drugs COLLATE utf8mb4_general_ci");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fluid_drugs');
    }
};
