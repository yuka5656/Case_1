<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\DB;

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
        $users = DB::table('users')
                    ->join('timestamps', 'users.id', '=', 'timestamps.user_id')
                    ->join('breaktimes', 'users.id', '=', 'breaktimes.user_id')
                    ->get();

        return $this->hasMany(Timestamp::class);
    }

    public function breaktime()
    {
        // $users = DB::table('users')
        //             ->join('breaktimes', 'users.id', '=', 'breaktimes.user_id')
        //             ->get();

        return $this->hasMany(Breaktime::class);
    }

}

// 条件をつけて紐づけする(モデルに)
// ジョインとウェアを使う
