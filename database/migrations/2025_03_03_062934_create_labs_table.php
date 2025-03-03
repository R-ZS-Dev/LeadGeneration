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
        Schema::create('labs', function (Blueprint $table) {
            $table->id('l_id')->collation('utf8mb4_general_ci');;
            $table->text('l_name')->collation('utf8mb4_general_ci');;
            $table->string('l_billcode',15)->collation('utf8mb4_general_ci');;
            $table->text('l_reporttitle')->collation('utf8mb4_general_ci');;
            $table->text('l_reportfooter')->nullable()->collation('utf8mb4_general_ci');;
            $table->json('rowboxes')->nullable()->collation('utf8mb4_general_ci');;
            $table->enum('show_quick_button', ['0', '1'])->default('1')->collation('utf8mb4_general_ci');
            $table->string('quick_button_text')->nullable()->collation('utf8mb4_general_ci');;
            $table->json('quickboxes')->nullable()->collation('utf8mb4_general_ci');;
            $table->enum('l_active',['0', '1'])->default('0')->collation('utf8mb4_general_ci');
            $table->string('l_insertby',40)->collation('utf8mb4_general_ci');
            $table->enum('close', ['0', '1'])->default('1')->collation('utf8mb4_general_ci');
            $table->enum('status', ['0', '1'])->default('1')->collation('utf8mb4_general_ci');
            $table->timestamps();
        });
        DB::statement("ALTER TABLE labs COLLATE utf8mb4_general_ci");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('labs');
    }
};
