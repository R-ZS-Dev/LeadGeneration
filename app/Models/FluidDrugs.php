<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FluidDrugs extends Model
{
    protected $table = 'fluid_drugs';
    protected $primaryKey = 'fd_id';
    protected $fillable = [
        'fd_gname',
        'fd_cname',
        'fd_desc',
        'fd_billcode',
        'fd_billamount',
        'fd_units',
        'fd_confrom',
        'fd_conto',
        'fd_defaultnote',
        'fd_from',
        'fd_to',
        'fd_prime',
        'fd_drug',
        'fd_amountforunit',
        'fd_cardioplegia',
        'fd_blood',
        'fd_hematocrit',
        'fd_display',
        'fd_amount',
        'fd_active',
        'fd_quick',
        'fd_insertby',
        'status',
        'close',
    ];

    public function lFrom()
    {
        return $this->belongsTo(FluidLocations::class, 'fd_from', 'fl_id');
    }

    public function lTo()
    {
        return $this->belongsTo(FluidLocations::class, 'fd_to', 'fl_id');
    }

}

