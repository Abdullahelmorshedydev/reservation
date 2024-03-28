<?php

namespace App\Http\Controllers\Web\Site;

use App\Enums\MovieStatusEnum;
use App\Enums\ShowtimeStatusEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Web\Site\StoreAttendeeRequest;
use App\Models\Eventday;
use App\Models\Movie;
use App\Models\Showtime;
use App\Services\Site\AttendeeService;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AttendeeController extends Controller
{
    public function index()
    {
        $eventdays = Eventday::where('event_date', '>=', Carbon::today())->has('movies')->get();
        $movies = Movie::where('status', MovieStatusEnum::ACTIVE->value)->has('showtimes')->get();
        $showtimes = Showtime::where('status', ShowtimeStatusEnum::ACTIVE->value)->get();
        return view('site.reserve', compact('eventdays', 'movies', 'showtimes'));
    }

    public function store(StoreAttendeeRequest $request, AttendeeService $attendeeService)
    {
        $attendeeService->store($request->validated());
        return back()->with('success', __('web/site/attendee.store_success'));
    }
}
