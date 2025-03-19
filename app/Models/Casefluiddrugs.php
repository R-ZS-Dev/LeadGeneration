<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Casefluiddrugs extends Model
{
    protected $table = 'case_fluiddrugs'; // Table Name

    protected $primaryKey = 'cfluid_id'; // Primary Key

    protected $fillable = [
        'cfuild_userid',
        'cfluid_drugname',
        'cfluid_date',
        'cfluid_time',
        'cfluid_drug',
        'cfluid_prime',
        'cfluid_card',
        'cfluid_amount',
        'cfluid_concentper',
        'cfluid_concentml',
        'cfluid_lot',
        'cfluid_exp',
        'cfluid_billcode',
        'cfluid_billamnt',
        'fd_from',
        'fd_to',
        'cfluid_note',
        'cfluid_insertby'
    ];

    public function fluid()
    {
        return $this->belongsTo(FluidDrugs::class, 'cfluid_drug', 'fd_id');
    }
}
