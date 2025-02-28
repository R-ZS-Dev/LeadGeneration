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
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('report_name', 255);
            $table->string('address1', 500);
            $table->string('address2', 500);
            $table->string('header_image', 255);
            $table->string('footer_image', 255);
            $table->string('active', 3)->default('no'); // Default to "no"
            $table->tinyInteger('status')->default(1);
            $table->softDeletes(); // Enable SoftDeletes
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};
