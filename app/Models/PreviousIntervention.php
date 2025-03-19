<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PreviousIntervention extends Model
{
    protected $primaryKey = 'pi_id';

    public $timestamps = true;

    protected $fillable = [
        'pat_id',
        'pcv_in',
        'pcab',
        'pv_pro',
        'pre_pro_1',
        'pre_pro_2',
        'pre_pro_3',
        'pre_pro_4',
        'pre_pro_5',
        'ppc_i',
        'pci_care',
        'ind_sur',
        'pci_s',
        'stype_id',
        'pci_interval',
        'opci',
        'intervention_1',
        'intervention_2',
        'intervention_3',
        'intervention_4',
        'intervention_5',
        'intervention_6',
        'intervention_7',
        'pi_insertby',
        'status',
        'close',
    ];
}
