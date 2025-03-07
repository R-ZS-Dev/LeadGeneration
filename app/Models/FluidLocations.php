<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FluidLocations extends Model
{
    protected $table = 'fluid_locations';

    protected $primaryKey = 'fl_id';

    protected $fillable = [
        'fl_name',
        'fl_type',
        'fl_active',
        'fl_insertby',
        'status',
        'close',
    ];

     public function fluidDrugMixturesFrom()
     {
         return $this->hasMany(FluidDrugMixture::class, 'fl_name', 'flm_id');
     }
 
     public function fluidDrugMixturesTo()
     {
         return $this->hasMany(FluidDrugMixture::class, 'fl_type', 'flm_id');
     }
}
