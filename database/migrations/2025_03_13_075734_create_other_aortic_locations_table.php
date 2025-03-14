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
        Schema::create('other_aortic_locations', function (Blueprint $table) {
            $table->id('oal_id');
            $table->unsignedBigInteger('pat_id');

            $table->enum('root', ['0', '1'])->default('1')->collation('utf8mb4_general_ci');
            $table->enum('ascending', ['0', '1'])->default('1')->collation('utf8mb4_general_ci');
            $table->enum('hemi_arch', ['0', '1'])->default('1')->collation('utf8mb4_general_ci');
            $table->enum('total_arch', ['0', '1'])->default('1')->collation('utf8mb4_general_ci');
            $table->enum('descending_proximal', ['0', '1'])->default('1')->collation('utf8mb4_general_ci');
            $table->enum('descending_mid', ['0', '1'])->default('1')->collation('utf8mb4_general_ci');
            $table->enum('thoracoabdominal', ['0', '1'])->default('1')->collation('utf8mb4_general_ci');
            $table->enum('apsg_use', ['0', '1'])->default('1')->collation('utf8mb4_general_ci');
            $table->enum('iv_ri', ['0', '1'])->default('1')->collation('utf8mb4_general_ci');
            $table->enum('csf_du', ['0', '1'])->default('1')->collation('utf8mb4_general_ci');
            $table->enum('el_trunk', ['0', '1'])->default('1')->collation('utf8mb4_general_ci');
            $table->enum('ceaf_lumen', ['0', '1'])->default('1')->collation('utf8mb4_general_ci');
            $table->enum('ap_other', ['0', '1'])->default('1')->collation('utf8mb4_general_ci');
            $table->string('ap_tevar', 30)->nullable()->collation('utf8mb4_general_ci');

            $table->string('oal_insertby', 50)->collation('utf8mb4_general_ci');
            $table->enum('status', ['0', '1'])->default('1')->collation('utf8mb4_general_ci');
            $table->enum('close', ['0', '1'])->default('1')->collation('utf8mb4_general_ci');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('other_aortic_locations');
    }
};
