<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Time extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'work_date',
        'attend',
        'leave',
    ];
    
    // ユーザーとのリレーション
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // 休憩情報とのリレーション
    public function rests()
    {
        return $this->hasMany(Rest::class);
    }
}
