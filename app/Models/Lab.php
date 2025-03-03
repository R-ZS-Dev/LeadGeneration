<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lab extends Model
{
    protected $primaryKey = 'l_id';
    protected $fillable = [
        'l_name',
        'l_billcode',
        'l_reporttitle',
        'l_reportfooter',
        'rowboxes',
        'show_quick_button',
        'quick_button_text',
        'quickboxes',
        'l_active',
        'l_insertby',
        'close',
        'status',
    ];

}
