<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rest extends Model
{
    use HasFactory;

    protected $fillable = [
        'time_id',
        'break',
        'break_end',
    ];

    // Timesテーブルとのリレーション
    public function time()
    {
        return $this->belongsTo(Time::class);
    }
}
