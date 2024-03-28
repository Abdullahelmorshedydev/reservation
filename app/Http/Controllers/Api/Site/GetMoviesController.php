<?php

namespace App\Http\Controllers\Api\Site;

use App\Http\Controllers\Controller;
use App\Models\Eventday;
use Illuminate\Http\Request;

class GetMoviesController extends Controller
{
    public function getMovies($id)
    {
        $eventday = Eventday::where('id', $id)->first();
        return response()->json(['data' => $eventday->movies]);
    }
}
