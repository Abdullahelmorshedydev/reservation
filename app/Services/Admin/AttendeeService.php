<?php

namespace App\Services\Admin;

use App\Models\Attendee;

class AttendeeService
{
    public function index()
    {
        return Attendee::paginate();
    }

    public function destroy($attendee)
    {
        return $attendee->delete();
    }
}
