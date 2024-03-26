<?php

namespace App\Services\Admin;

use App\Enums\MovieStatusEnum;
use App\Enums\MovieTypeEnum;
use App\Models\Movie;

class MovieService
{
    public function index()
    {
        return Movie::paginate();
    }

    public function store($request)
    {
        return Movie::create($request);
    }

    public function update($movie, $request)
    {
        return $movie->update($request);
    }

    public function destroy($movie)
    {
        return $movie->delete();
    }
}
