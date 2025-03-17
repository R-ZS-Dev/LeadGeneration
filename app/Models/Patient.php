<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $table = 'patients';
    protected $primaryKey = 'pat_id';

    protected $fillable = [
        'start_date','start_time','case_id','last_name','first_name','middle_name','medical_record','dob','height','weight','blood_type','admit_date','hospital','room','is_child','bmi','surface_area_method','flow_rate','heparin_dose','sex','admit_source','discharge_date','pat_insertby','status','close',
        'aceorarb','inhibitor','inhibitor_no','amiod','anticoagulant','medicat','antiplaletes','aspirin',
        'beta_blocker','blocker_prior','coumadin','factorxa','glycoprotein','med_name','ointravanous','lipid','med_type','long_acting','nitrates','antianginal','steroids','thrombin','thrombolytics'
    ];
}
