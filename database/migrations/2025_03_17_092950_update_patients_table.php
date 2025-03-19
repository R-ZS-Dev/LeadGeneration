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
        Schema::table('patients', function (Blueprint $table) {
            $table->string('aceorarb', 25)->nullable()->collation('utf8mb4_general_ci');
            $table->string('inhibitor', 25)->nullable()->collation('utf8mb4_general_ci');
            $table->string('inhibitor_no', 10)->nullable()->collation('utf8mb4_general_ci');
            $table->string('amiod', 25)->nullable()->collation('utf8mb4_general_ci');
            $table->enum('anticoagulant', ['0', '1'])->nullable()->collation('utf8mb4_general_ci');
            $table->string('medicat')->nullable()->collation('utf8mb4_general_ci');
            $table->string('antiplaletes',25)->nullable()->collation('utf8mb4_general_ci');
            $table->string('aspirin',25)->nullable()->collation('utf8mb4_general_ci');
            $table->string('beta_blocker',25)->nullable()->collation('utf8mb4_general_ci');
            $table->string('blocker_prior',25)->nullable()->collation('utf8mb4_general_ci');
            $table->string('calcium_prior',25)->nullable()->collation('utf8mb4_general_ci');
            $table->string('coumadin', 25)->nullable()->collation('utf8mb4_general_ci');
            $table->string('factorxa', 15)->nullable()->collation('utf8mb4_general_ci');
            $table->string('glycoprotein', 15)->nullable()->collation('utf8mb4_general_ci');
            $table->string('med_name')->nullable()->collation('utf8mb4_general_ci');
            $table->enum('ointravanous', ['0', '1'])->nullable()->collation('utf8mb4_general_ci');
            $table->string('lipid',25)->nullable()->collation('utf8mb4_general_ci');
            $table->string('med_type')->nullable()->collation('utf8mb4_general_ci');
            $table->string('long_acting', 12)->nullable()->collation('utf8mb4_general_ci');
            $table->enum('nitrates', ['0', '1'])->nullable()->collation('utf8mb4_general_ci');
            $table->string('antianginal',25)->nullable()->collation('utf8mb4_general_ci');
            $table->string('steroids',25)->nullable()->collation('utf8mb4_general_ci');
            $table->string('thrombin',25)->nullable()->collation('utf8mb4_general_ci');
            $table->enum('thrombolytics', ['0', '1'])->nullable()->collation('utf8mb4_general_ci');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('patients', function (Blueprint $table) {
            $table->dropColumn([
                'aceorarb', 'inhibitor', 'inhibitor_no', 'amiod', 'anticoagulant', 'medicat', 'antiplaletes',
                'aspirin', 'beta_blocker', 'blocker_prior','calcium_prior' ,'coumadin', 'factorxa', 'glycoprotein', 'med_name',
                'ointravanous', 'lipid', 'med_type', 'long_acting', 'nitrates', 'antianginal', 'steroids',
                'thrombin', 'thrombolytics'
            ]);
        });
    }
};
