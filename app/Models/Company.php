<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'company_name',
        'company_email',
        'company_phone',
        'company_mobile',
        'company_address',
        'company_image',
        'fav_photo',
    ];

    // Relationship: Each company belongs to a user
    public function user() {
        return $this->belongsTo(User::class);
    }
}
