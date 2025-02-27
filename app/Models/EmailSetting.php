<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmailSetting extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'mail_from_name',
        'email',
        'password',
        'smtp',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
