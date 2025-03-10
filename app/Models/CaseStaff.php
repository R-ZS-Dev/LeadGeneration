<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CaseStaff extends Model
{
    protected $primaryKey = 'cs_id';
    protected $fillable = [
        'pet_id',
        'surgeon',
        'second_surgeon',
        'pa_first_assistant',
        'anesthesiologist',
        'crna_res',
        'cardiologist',
        'family_md',
        'perfusionist',
        'perfusionist_category',
        'perfusionist_status',
        'second_perfusionist',
        'second_perfusionist_category',
        'cs_insertby',
        'status',
        'close'
    ];

    public function surgeonDetail()
    {
        return $this->belongsTo(Staff::class, 'surgeon', 'st_id');
    }

    public function secondSurgeonDetail()
    {
        return $this->belongsTo(Staff::class, 'second_surgeon', 'st_id');
    }

    public function paFirstAssistantDetail()
    {
        return $this->belongsTo(Staff::class, 'pa_first_assistant', 'st_id');
    }

    public function anesthesiologistDetail()
    {
        return $this->belongsTo(Staff::class, 'anesthesiologist', 'st_id');
    }

    public function crnaResDetail()
    {
        return $this->belongsTo(Staff::class, 'crna_res', 'st_id');
    }

    public function cardiologistDetail()
    {
        return $this->belongsTo(Staff::class, 'cardiologist', 'st_id');
    }

    public function familyMdDetail()
    {
        return $this->belongsTo(Staff::class, 'family_md', 'st_id');
    }

    public function perfusionistDetail()
    {
        return $this->belongsTo(Staff::class, 'perfusionist', 'st_id');
    }

    public function perfusionistStatusDetail()
    {
        return $this->belongsTo(Staff::class, 'perfusionist_status', 'st_id');
    }
    
    public function secondPerfusionistDetail()
    {
        return $this->belongsTo(Staff::class, 'second_perfusionist', 'st_id');
    }
}
