<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReportReviews extends Model
{
    protected $table = 'report_reviews';
    protected $primaryKey = 'rr_id';

    protected $fillable = [
        'report_type',
        'rr_name',
        'rr_desc',
        'rr_insertby',
        'rr_active',
        'status',
        'close',
    ];

    public function report()
    {
        return $this->belongsTo(Report::class, 'report_type', 'rep_id');
    }

}
