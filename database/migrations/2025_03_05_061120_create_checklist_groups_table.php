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
        Schema::create('checklist_groups', function (Blueprint $table) {
            $table->id('clg_id');
            $table->string('clg_name',100);
            $table->text('clg_description')->nullable();
            $table->json('rowboxes')->nullable();
            $table->enum('clg_active', ['0', '1'])->default('1');
            $table->string('clg_insertby',40);
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
        Schema::dropIfExists('checklist_groups');
    }
};
