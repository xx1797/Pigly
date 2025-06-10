<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    // 🔽 追加：ユーザーが持つ目標体重のリレーション
    public function weightTarget()
    {
        return $this->hasOne(WeightTarget::class);
    }

    // 🔽 追加：ユーザーが持つ体重ログのリレーション（もし未定義なら）
    public function weightLogs()
    {
        return $this->hasMany(WeightLog::class);
    }
}
