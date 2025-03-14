<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OtherAorticLocation extends Model
{
    use HasFactory;

    protected $table = 'other_aortic_locations';
    protected $primaryKey = 'oal_id';

    protected $fillable = [
        'pat_id',
        'root',
        'ascending',
        'hemi_arch',
        'total_arch',
        'descending_proximal',
        'descending_mid',
        'thoracoabdominal',
        'apsg_use',
        'iv_ri',
        'csf_du',
        'el_trunk',
        'ceaf_lumen',
        'ap_other',
        'ap_tevar',
        'oal_insertby',
        'status',
        'close',
    ];
}
