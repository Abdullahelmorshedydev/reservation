<?php

namespace App\Services\Admin;

use App\Models\Showtime;

class ShowtimeService
{
    public function index()
    {
        return Showtime::paginate();
    }

    public function store($request)
    {
        return Showtime::create($request);
    }

    public function update($showtime, $request)
    {
        return $showtime->update($request);
    }

    public function destroy($showtime)
    {
        return $showtime->delete();
    }
}
