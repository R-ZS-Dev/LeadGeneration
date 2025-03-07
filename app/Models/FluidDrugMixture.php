<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FluidDrugMixture extends Model
{

    protected $primaryKey = 'flm_id';
    protected $fillable = [
        'flm_name',
        'flm_cname',
        'flm_desc',
        'flm_billcode',
        'flm_dname',
        'flm_ftype',
        'flm_ttype',
        'flm_display',
        'flm_amount',
        'flm_quick',
        'flm_prime',
        'flm_cardioplegia',
        'sort_order',
        'amount',
        'rowboxes',
        'flm_active',
        'flm_insertby',
        'status',
        'close',
    ];

    public function fromLocation()
    {
        return $this->belongsTo(FluidLocations::class, 'flm_ftype', 'fl_id');
    }

    public function toLocation()
    {
        return $this->belongsTo(FluidLocations::class, 'flm_ttype', 'fl_id');
    }
}
