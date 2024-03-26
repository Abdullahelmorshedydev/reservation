<?php

namespace App\Models;

use App\Enums\MovieTypeEnum;
use App\Enums\MovieStatusEnum;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Movie extends Model
{
    use HasFactory, HasTranslations;

    public $translatable = ['name', 'slug', 'description'];

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
        $locale = app()->getLocale();
        return "slug->{$locale}";
    }

    protected $casts = [
        'type' => MovieTypeEnum::class,
        'status' => MovieStatusEnum::class,
    ];
}
