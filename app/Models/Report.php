<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;
    protected $primaryKey = 'rep_id';
    protected $fillable = [
         'report_name', 'rep_address1', 'rep_address2', 'rep_headimage', 'rep_footimage','rep_insertby','active', 'status'
    ];
}
