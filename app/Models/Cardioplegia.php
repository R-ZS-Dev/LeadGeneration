<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cardioplegia extends Model
{
    protected $table = 'cardioplegias';

    protected $primaryKey = 'card_id';

    protected $fillable = [
        'card_name',
        'card_desc',
        'card_blood',
        'card_solution',
        'card_solcon',
        'card_display',
        'card_cpgtype',
        'card_dose',
        'card_temp',
        'card_active',
        'card_quick',
        'card_insertby',
        'status',
        'close',
    ];
}
