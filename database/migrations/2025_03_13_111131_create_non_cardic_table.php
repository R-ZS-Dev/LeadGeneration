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
        Schema::create('non_cardic', function (Blueprint $table) {
            $table->id();
            $table->enum('carotid', ['0','1', '2', '3'])->default('0');
            $table->enum('vascular', ['0','1', '2', '3'])->default('0');
            $table->enum('thoracic', ['0','1', '2', '3'])->default('0');
            $table->enum('other', ['0','1', '2', '3'])->default('0');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('non_cardic');
    }
};
