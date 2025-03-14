<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OtherCardiacProcedure extends Model
{
    protected $table = 'other_cardiac_procedures';
    protected $primaryKey = 'ocp_id';

    protected $fillable = [
        'pat_id',
        'afib_el',
        'asd_pfo',
        'aap_raa',
        'arr_dev_sur',
        'lead_in',
        'msc_therapy',
        'tl_rev',
        'afib_il',
        'asd_sv',
        'arr_correction_ext',
        'lva',
        'pt_acute',
        'ss_res',
        'ssr_type',
        'sv_res',
        'tumor_select',
        'card_tx',
        'cardiac_t',
        'p_congenital',
        'p_other',
        'vsd_con',
        'ocp_insertby',
        'status',
        'close',
    ];
}
