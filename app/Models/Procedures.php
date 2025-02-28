<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Procedures extends Model
{
    protected $table = 'procedures';

    protected $primaryKey = 'pro_id';

    public $timestamps = true;

    protected $fillable = [
        'pro_name',
        'pro_cptcode',
        'pro_display',
        'pro_desc',
        'pro_active',
        'pro_groups',
        'pro_insertby',
        'close',
        'status'
    ];

}
