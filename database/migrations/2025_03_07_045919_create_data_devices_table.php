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
        Schema::create('data_devices', function (Blueprint $table) {
            $table->id('dd_id');
            $table->string('dd_name',100)->collation('utf8mb4_general_ci');
            $table->text('dd_desc')->collation('utf8mb4_general_ci');
            $table->string('dd_type',100)->collation('utf8mb4_general_ci');
            $table->string('dd_con',40)->collation('utf8mb4_general_ci');
            $table->string('dd_handshake',40)->collation('utf8mb4_general_ci');
            $table->integer('dd_baudrate')->collation('utf8mb4_general_ci');
            $table->integer('dd_databit')->collation('utf8mb4_general_ci');
            $table->enum('dd_active', ['0', '1'])->default('1')->collation('utf8mb4_general_ci');
            $table->string('dd_insertby', 50)->collation('utf8mb4_general_ci');
            $table->enum('status', ['0', '1'])->default('1')->collation('utf8mb4_general_ci');
            $table->enum('close', ['0', '1'])->default('1')->collation('utf8mb4_general_ci');
            $table->timestamps();
        });
        DB::statement("ALTER TABLE data_devices COLLATE utf8mb4_general_ci");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_devices');
    }
};
