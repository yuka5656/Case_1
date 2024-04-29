<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Breaktime extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id','break_Start', 'break_End',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
