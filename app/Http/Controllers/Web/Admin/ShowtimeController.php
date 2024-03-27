<?php

namespace App\Http\Controllers\Web\Admin;

use App\Models\Showtime;
use Illuminate\Http\Request;
use App\Enums\ShowtimeStatusEnum;
use App\Http\Controllers\Controller;
use App\Services\Admin\ShowtimeService;
use App\Http\Requests\Web\Admin\Showtime\StoreShowtimeRequest;
use App\Http\Requests\Web\Admin\Showtime\UpdateShowtimeRequest;

class ShowtimeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ShowtimeService $showtimeService)
    {
        return view('admin.pages.showtimes.index', ['showtimes' => $showtimeService->index()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $status = ShowtimeStatusEnum::cases();
        return view('admin.pages.showtimes.create', compact('status'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreShowtimeRequest $request, ShowtimeService $showtimeService)
    {
        return back()->with('success', __('web/admin/showtime.create_success'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Showtime $showtime)
    {
        $status = ShowtimeStatusEnum::cases();
        return view('admin.pages.showtimes.edit', compact('showtime', 'status'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateShowtimeRequest $request, Showtime $showtime, ShowtimeService $showtimeService)
    {
        $showtimeService->update($showtime, $request->validated());
        return redirect()->route('admin.showtimes.index')->with('success', __('web/admin/showtime.update_success'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Showtime $showtime, ShowtimeService $showtimeService)
    {
        $showtimeService->destroy($showtime);
        return back()->with('success', __('web/admin/showtime.delete_success'));
    }
}
