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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->unique();
            $table->string('company_name');
            $table->string('company_email')->unique();
            $table->string('company_phone')->nullable();
            $table->string('company_mobile')->nullable();
            $table->text('company_address')->nullable();
            $table->string('fav_photo', 255)->nullable()->default('default.jpg');
            $table->string('company_image', 255)->nullable()->default('default.jpg');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
