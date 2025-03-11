<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CoronaryArteryBypass extends Model
{
    protected $primaryKey = 'cab_id';
    protected $fillable = [
        'pet_id',
        'cab_arterial',
        'cab_venous',
        'cab_htechniques',
        'cab_htime',
        'cab_ima_options',
        'cab_ima_anastomoses',
        'cab_ima_htechniques',
        'cab_ima_preson',
        'cab_radial_arteries',
        'cab_radial_distal',
        'cab_radial_time',
        'cab_distal_hanastomoses',
        'cab_distal_anastomoses',
        'cab_proximal',
        'cab_ins_distal',
        'cab_ins_proximal',
        'cab_ins_conduit',
        'cab_ins_position',
        'cab_ins_end',
        'note',
        'cab_insertby',
        'status',
        'close',
    ];
}
