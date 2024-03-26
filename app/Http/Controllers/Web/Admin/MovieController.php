<?php

namespace App\Http\Controllers\Web\Admin;

use App\Enums\MovieStatusEnum;
use App\Enums\MovieTypeEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Web\Admin\Movie\StoreMovieRequest;
use App\Http\Requests\Web\Admin\Movie\UpdateMovieRequest;
use App\Models\Movie;
use App\Services\Admin\MovieService;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(MovieService $movieService)
    {
        return view('admin.pages.movies.index', ['movies' => $movieService->index()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(MovieService $movieService)
    {
        $status = MovieStatusEnum::cases();
        $types = MovieTypeEnum::cases();
        return view('admin.pages.movies.create', compact('status', 'types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMovieRequest $request, MovieService $movieService)
    {
        $movieService->store($request->validated());
        return back()->with('success', 'Movie Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Movie $movie)
    {
        return view('admin.pages.movies.show', compact('movie'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Movie $movie)
    {
        $status = MovieStatusEnum::cases();
        $types = MovieTypeEnum::cases();
        return view('admin.pages.movies.edit', compact('movie', 'status', 'types'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMovieRequest $request, Movie $movie, MovieService $movieService)
    {
        $movieService->update($movie, $request->validated());
        return redirect()->route('admin.movies.index')->with('success', 'Movie Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Movie $movie, MovieService $movieService)
    {
        $movieService->destroy($movie);
        return back()->with('success', 'Movie Deleted Successfully');
    }
}
