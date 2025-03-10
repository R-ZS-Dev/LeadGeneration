<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CaseSupply extends Model
{
    protected $table = 'case_supply';
    protected $primaryKey = 'csu_id';

    protected $fillable = [
        'pet_id',
        'csu_group',
        'csu_type',
        'csu_manufacturer',
        'csu_name',
        'csu_lot_number',
        'csu_ex_date',
        'csu_billing_code',
        'csu_number_used',
        'csu_note',
        'cs_insertby',
        'status',
        'close',
    ];

       // Relation with SupplyGroup
       public function supplyGroup()
       {
           return $this->belongsTo(SupplyGroup::class, 'csu_group', 'spg_id');
       }
}
