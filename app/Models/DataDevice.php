<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataDevice extends Model
{
    protected $table = 'data_devices';

    protected $primaryKey = 'dd_id';

    protected $fillable = [
        'dd_name',
        'dd_desc',
        'dd_type',
        'dd_con',
        'dd_handshake',
        'dd_baudrate',
        'dd_databit',
        'dd_active',
        'dd_insertby',
        'status',
        'close',
    ];
}
