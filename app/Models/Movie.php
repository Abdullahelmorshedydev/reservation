<?php

namespace App\Models;

use App\Enums\MovieTypeEnum;
use App\Enums\MovieStatusEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Movie extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'price',
        'type',
        'status',
    ];

    public function getRouteKeyName()
    {
        return "slug";
    }

    protected $casts = [
        'type' => MovieTypeEnum::class,
        'status' => MovieStatusEnum::class,
    ];
}
