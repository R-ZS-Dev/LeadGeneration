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
        Schema::create('checklists', function (Blueprint $table) {
            $table->id('c_id');
            $table->string('l_name',100);
            $table->text('l_description')->nullable();
            $table->json('rowboxes')->nullable();
            $table->enum('l_active', ['0', '1'])->default('1');
            $table->string('l_insertby',40);
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
        Schema::dropIfExists('checklists');
    }
};
