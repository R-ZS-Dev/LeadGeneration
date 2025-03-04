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
        Schema::create('general_events', function (Blueprint $table) {
            $table->id('g_id');
            $table->string('note',100);
            $table->text('g_description')->nullable();
            $table->enum('g_active', ['0', '1'])->default('1');
            $table->enum('g_quick', ['0', '1'])->default('1');
            $table->text('g_display')->nullable();
            $table->string('g_insertby',40);
            $table->enum('close', ['0', '1'])->default('1');
            $table->enum('status', ['0', '1'])->default('1');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('general_events');
    }
};
