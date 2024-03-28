<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attendee;
use App\Services\Admin\AttendeeService;
use Illuminate\Http\Request;

class AttendeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(AttendeeService $attendeeService)
    {
        return view('admin.pages.attendee.index', ['attendees' => $attendeeService->index()]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Attendee $attendee, AttendeeService $attendeeService)
    {
        $attendeeService->destroy($attendee);
        return redirect()->route('admin.attendees.index')->with('success', __('web/admin/attendee.delete_success'));
    }
}
