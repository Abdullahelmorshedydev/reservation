<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eventday extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_date',
    ];

    public function movies()
    {
        return $this->belongsToMany(Movie::class)->withTimestamps();
    }
}
