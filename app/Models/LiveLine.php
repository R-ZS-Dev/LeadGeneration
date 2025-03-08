<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LiveLine extends Model
{
    protected $table = 'live_line';

    protected $primaryKey = 'll_id';

    protected $fillable = [
        'll_gname',
        'll_label',
        'll_displayorder',
        'll_removetime',
        'll_showremind',
        'll_manuallog',
        'll_pumpoff',
        'll_linechart',
        'll_skip',
        'll_highlimit',
        'll_highcritical',
        'll_highwarn',
        'll_goodfrom',
        'll_goodto',
        'll_lowlimit',
        'll_lowcritical',
        'll_lowwarn',
        'll_active',
        'll_insertby',
        'status',
        'close'
    ];
}
