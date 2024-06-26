<?php

namespace App\Services\Admin;

use App\Models\Movie;
use Exception;
use Illuminate\Support\Facades\DB;

class MovieService
{
    public function index()
    {
        return Movie::paginate();
    }

    public function store($request)
    {
        try {
            DB::beginTransaction();
            $movie = Movie::create($request);
            $movie->showtimes()->attach($request['showtimes']);
            DB::commit();
            return true;
        } catch (Exception $e) {
            DB::rollBack();
            return $e->getMessage();
        }
    }

    public function update($movie, $request)
    {
        try {
            DB::beginTransaction();
            $movie->update($request);
            $movie->showtimes()->sync($request['showtimes']);
            DB::commit();
            return true;
        } catch (Exception $e) {
            DB::rollBack();
            return $e->getMessage();
        }
    }

    public function destroy($movie)
    {
        try {
            DB::beginTransaction();
            $movie->showtimes()->detach();
            $movie->delete();
            DB::commit();
            return true;
        } catch (Exception $e) {
            DB::rollBack();
            return $e->getMessage();
        }
    }
}
