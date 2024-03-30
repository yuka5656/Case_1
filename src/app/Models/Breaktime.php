<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Breaktime extends Model
{
    use HasFactory;

    protected $fillable = [
        'timestamp_id','break_Start', 'break_End',
    ];

    public function create()
    {
        return $this->belongsTo(timestamps::class);
    }
}
