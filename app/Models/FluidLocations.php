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
}
