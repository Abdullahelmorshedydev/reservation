<?php

namespace App\Http\Controllers\Web\Admin;

use App\Enums\MovieStatusEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Web\Admin\Eventday\StoreEventdayRequest;
use App\Http\Requests\Web\Admin\Eventday\UpdateEventdayRequest;
use App\Models\Eventday;
use App\Models\Movie;
use App\Services\Admin\EventdayService;
use Illuminate\Http\Request;

class EventdayController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(EventdayService $eventdayService)
    {
        return view('admin.pages.eventdays.index', ['eventdays' => $eventdayService->index()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $movies = Movie::where('status', MovieStatusEnum::ACTIVE->value)->get();
        return view('admin.pages.eventdays.create', compact('movies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEventdayRequest $request, EventdayService $eventdayService)
    {
        $eventdayService->store($request->validated());
        return back()->with('success', __('web/admin/eventday.create_success'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Eventday $eventday)
    {
        return view('admin.pages.eventdays.show', compact('eventday'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Eventday $eventday)
    {
        $movies = Movie::where('status', MovieStatusEnum::ACTIVE->value)->get();
        return view('admin.pages.eventdays.edit', compact('eventday', 'movies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEventdayRequest $request, Eventday $eventday, EventdayService $eventdayService)
    {
        $eventdayService->update($eventday, $request->validated());
        return back()->with('success', __('web/admin/eventday.update_success'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Eventday $eventday, EventdayService $eventdayService)
    {
        $eventdayService->destroy($eventday);
        return redirect()->route('admin.eventdays.index')->with('success', __('web/admin/eventday.delete_success'));
    }
}
