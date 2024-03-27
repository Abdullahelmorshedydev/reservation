<?php

namespace App\Models;

use App\Enums\ShowtimeStatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Showtime extends Model
{
    use HasFactory;

    protected $fillable = [
        'start_time',
        'end_time',
        'status',
    ];

    protected $casts = [
        'status' => ShowtimeStatusEnum::class,
    ];
}
