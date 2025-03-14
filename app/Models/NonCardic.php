<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NonCardic extends Model
{
    protected $table = 'non_cardic';
    public $timestamps = true;
    protected $fillable = [
        'carotid',
        'vascular',
        'thoracic',
        'other',
    ];
}
