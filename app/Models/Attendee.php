<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendee extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'eventday_id',
        'movie_id',
        'showtime_id',
    ];

    public function eventday()
    {
        return $this->belongsTo(Eventday::class);
    }

    public function movie()
    {
        return $this->belongsTo(Movie::class);
    }

    public function showtime()
    {
        return $this->belongsTo(Showtime::class);
    }
}
