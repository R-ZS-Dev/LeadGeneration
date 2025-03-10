<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CaseEquipment extends Model
{
    protected $primaryKey = 'ce_id';
    public $timestamps = true;
    protected $fillable = [
        'pet_id',
        'e_group',
        'e_configure',
        'e_type',
        'e_manufacturer',
        'e_name',
        'serial_number',
        'last_service_date',
        'next_service_date',
        'billing_code',
        'note',
        'ce_insertby',
        'status',
        'close'
    ];

    public function equipmentGroup()
    {
        return $this->belongsTo(EquipmentGroup::class, 'e_group', 'eqg_id');
    }
    public function equipment()
    {
        return $this->belongsTo(Equipment::class, 'e_configure', 'eq_id');
    }
}
