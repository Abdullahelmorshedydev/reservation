<?php

namespace App\Http\Controllers\Api\Site;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use Illuminate\Http\Request;

class GetShowtimesController extends Controller
{
    public function getShowtimes($id)
    {
        $movie = Movie::where('id', $id)->first();
        return response()->json(['data' => $movie->showtimes]);
    }
}
