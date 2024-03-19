<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DateStamps extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'work_Start', 'work_End', 'break_Start', 'break_End',
    ];

    public function user()
    {
        return $this->belongsTo(users::class);
    }
}