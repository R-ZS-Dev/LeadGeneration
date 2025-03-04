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
        Schema::create('checklist_items', function (Blueprint $table) {
            $table->id('cl_id');
            $table->string('cl_name',100);
            $table->text('cl_description')->nullable();
            $table->enum('cl_active', ['0', '1'])->default('1');
            $table->string('cl_insertby',40);
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
        Schema::dropIfExists('checklist_items');
    }
};
