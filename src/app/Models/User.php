<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Timestamp;
use App\Models\Breaktime;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function timestamp()
    {
        return $this->hasMany(Timestamp::class);
    }

    public function breaktime()
    {
        return $this->hasMany(Breaktime::class);
    }

    public function getDailyAttendance(){

        $attendance = DB::table('users')
                    ->join('timestamps', 'users.id', '=', 'timestamps.user_id')
                    ->join('breaktimes', 'users.id', '=', 'breaktimes.user_id')
                    ->get();

        return $attendance;
    }



}

// 条件をつけて紐づけする(モデルに)
// ジョインとウェアを使う
