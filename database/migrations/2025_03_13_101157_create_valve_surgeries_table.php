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
        Schema::create('valve_surgeries', function (Blueprint $table) {
            $table->id('caseval_id');
            $table->enum('valve_pro', ['Yes', 'No'])->default('No')->collation('utf8mb4_general_ci');
            $table->string('explant_position')->nullable()->collation('utf8mb4_general_ci');
            $table->string('explant_type')->nullable()->collation('utf8mb4_general_ci');
            $table->string('explant_etiology')->nullable()->collation('utf8mb4_general_ci');
            $table->enum('explant_device', ['Yes', 'No'])->default('No')->collation('utf8mb4_general_ci');
            $table->string('exp_model')->nullable()->collation('utf8mb4_general_ci');
            $table->string('exp_uid')->nullable()->collation('utf8mb4_general_ci');
            $table->enum('second_valve', ['Yes', 'No'])->default('No')->collation('utf8mb4_general_ci');
            $table->string('secexp_pos')->nullable()->collation('utf8mb4_general_ci');
            $table->string('secexplant_type')->nullable()->collation('utf8mb4_general_ci');
            $table->string('secexplant_etiology')->nullable()->collation('utf8mb4_general_ci');
            $table->enum('secexplant_devic', ['Yes', 'No'])->default('No')->collation('utf8mb4_general_ci');
            $table->string('secexp_model')->nullable()->collation('utf8mb4_general_ci');
            $table->string('secexp_uid')->nullable()->collation('utf8mb4_general_ci');
            $table->text('aortic_valve_pro')->collation('utf8mb4_general_ci');
            $table->string('perform')->nullable()->collation('utf8mb4_general_ci');
            $table->string('aortic_performed')->nullable()->collation('utf8mb4_general_ci');
            $table->enum('transcat', ['Yes', 'No'])->default('No')->collation('utf8mb4_general_ci');
            $table->string('approach')->nullable()->collation('utf8mb4_general_ci');
            $table->enum('commissural', ['Yes', 'No'])->default('No')->collation('utf8mb4_general_ci');
            $table->enum('ringannul', ['Yes', 'No'])->default('No')->collation('utf8mb4_general_ci');
            $table->enum('leafletplic', ['Yes', 'No'])->default('No')->collation('utf8mb4_general_ci');
            $table->enum('leafletresec', ['Yes', 'No'])->default('No')->collation('utf8mb4_general_ci');
            $table->enum('leafletfree', ['Yes', 'No'])->default('No')->collation('utf8mb4_general_ci');
            $table->enum('leafletpericard', ['Yes', 'No'])->default('No')->collation('utf8mb4_general_ci');
            $table->enum('leafletcomm', ['Yes', 'No'])->default('No')->collation('utf8mb4_general_ci');
            $table->enum('leafletdebridt', ['Yes', 'No'])->default('No')->collation('utf8mb4_general_ci');
            $table->enum('leafletraphe', ['Yes', 'No'])->default('No')->collation('utf8mb4_general_ci');
            $table->enum('repairleak', ['Yes', 'No'])->default('No')->collation('utf8mb4_general_ci');
            $table->enum('annular', ['Yes', 'No'])->default('No')->collation('utf8mb4_general_ci');
            $table->string('aorticimp_modelno')->nullable()->collation('utf8mb4_general_ci');
            $table->string('aortic_implnt')->nullable()->collation('utf8mb4_general_ci');
            $table->string('aorticimp_size')->nullable()->collation('utf8mb4_general_ci');
            $table->string('aorticimp_udi')->nullable()->collation('utf8mb4_general_ci');
            $table->string('aortic_exp')->nullable()->collation('utf8mb4_general_ci');
            $table->enum('mitrlvalve', ['Yes', 'No'])->default('No')->collation('utf8mb4_general_ci');
            $table->string('mitral_performed')->nullable()->collation('utf8mb4_general_ci');
            $table->string('mitral_perform')->nullable()->collation('utf8mb4_general_ci');
            $table->enum('repairannol', ['Yes', 'No'])->default('No')->collation('utf8mb4_general_ci');
            $table->enum('resection', ['Yes', 'No'])->default('No')->collation('utf8mb4_general_ci');
            $table->string('resecttype')->nullable()->collation('utf8mb4_general_ci');
            $table->string('resectloc')->nullable()->collation('utf8mb4_general_ci');
            $table->enum('leafletplicat', ['Yes', 'No'])->default('No')->collation('utf8mb4_general_ci');
            $table->enum('leafletdebrid', ['Yes', 'No'])->default('No')->collation('utf8mb4_general_ci');
            $table->enum('fold_plasty', ['Yes', 'No'])->default('No')->collation('utf8mb4_general_ci');
            $table->enum('slid_plasty', ['Yes', 'No'])->default('No')->collation('utf8mb4_general_ci');
            $table->enum('annular_decal', ['Yes', 'No'])->default('No')->collation('utf8mb4_general_ci');
            $table->enum('neochords', ['Yes', 'No'])->default('No')->collation('utf8mb4_general_ci');
            $table->string('neochard')->nullable()->collation('utf8mb4_general_ci');
            $table->enum('chordal_leaflet_transfer', ['Yes', 'No'])->default('No')->collation('utf8mb4_general_ci');
            $table->enum('leaflet_extension', ['Yes', 'No'])->default('No')->collation('utf8mb4_general_ci');
            $table->enum('edge_to_edge_repair', ['Yes', 'No'])->default('No')->collation('utf8mb4_general_ci');
            $table->enum('mitral_leaflet_clip', ['Yes', 'No'])->default('No')->collation('utf8mb4_general_ci');
            $table->enum('mitral_commissurotomy', ['Yes', 'No'])->default('No')->collation('utf8mb4_general_ci');
            $table->enum('mitral_commissuroplasty', ['Yes', 'No'])->default('No')->collation('utf8mb4_general_ci');
            $table->enum('mitral_cleft_repair', ['Yes', 'No'])->default('No')->collation('utf8mb4_general_ci');
            $table->enum('other_repair', ['Yes', 'No'])->default('No')->collation('utf8mb4_general_ci');
            $table->enum('attempt_prior', ['Yes', 'No'])->default('No')->collation('utf8mb4_general_ci');
            $table->string('mitral_chords')->nullable()->collation('utf8mb4_general_ci');
            $table->enum('transcather_replace', ['Yes', 'No'])->default('No')->collation('utf8mb4_general_ci');
            $table->enum('mitral_implnt', ['Yes', 'No'])->default('No')->collation('utf8mb4_general_ci');
            $table->string('mi_type')->nullable()->collation('utf8mb4_general_ci');
            $table->string('mitral_imn')->nullable()->collation('utf8mb4_general_ci');
            $table->string('mitral_size')->nullable()->collation('utf8mb4_general_ci');
            $table->string('mitral_udi')->nullable()->collation('utf8mb4_general_ci');
            $table->string('mitral_exp')->nullable()->collation('utf8mb4_general_ci');
            $table->enum('tricuspid', ['Yes', 'No'])->default('No')->collation('utf8mb4_general_ci');
            $table->string('tricuspidper')->nullable()->collation('utf8mb4_general_ci');
            $table->string('tricuspid_pro')->nullable()->collation('utf8mb4_general_ci');
            $table->string('typeofannulo')->nullable()->collation('utf8mb4_general_ci');
            $table->enum('transtricusp_replace', ['Yes', 'No'])->default('No')->collation('utf8mb4_general_ci');
            $table->enum('tricuspidimplnt', ['Yes', 'No'])->default('No')->collation('utf8mb4_general_ci');
            $table->string('tricuspid_modelno')->nullable()->collation('utf8mb4_general_ci');
            $table->string('tricuspid_implnt')->nullable()->collation('utf8mb4_general_ci');
            $table->string('tricuspidimp_size')->nullable()->collation('utf8mb4_general_ci');
            $table->string('tricuspidimp_udi')->nullable()->collation('utf8mb4_general_ci');
            $table->string('tricuspid_exp')->nullable()->collation('utf8mb4_general_ci');
            $table->enum('pulmonic', ['Yes', 'No'])->default('No')->collation('utf8mb4_general_ci');
            $table->string('pulmonicper')->nullable()->collation('utf8mb4_general_ci');
            $table->string('pulmonic_pro')->nullable()->collation('utf8mb4_general_ci');
            $table->enum('pulmonictrans_replace', ['Yes', 'No'])->default('No')->collation('utf8mb4_general_ci');
            $table->enum('pulomnicimplnt', ['Yes', 'No'])->default('No')->collation('utf8mb4_general_ci');
            $table->string('pulmonicimp_modelno')->nullable()->collation('utf8mb4_general_ci');
            $table->string('pulmonic_implnt')->nullable()->collation('utf8mb4_general_ci');
            $table->string('pulmonicimp_size')->nullable()->collation('utf8mb4_general_ci');
            $table->string('pulmonicimp_udi')->nullable()->collation('utf8mb4_general_ci');
            $table->string('pulmonic_exp')->nullable()->collation('utf8mb4_general_ci');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('valve_surgeries');
    }
};
