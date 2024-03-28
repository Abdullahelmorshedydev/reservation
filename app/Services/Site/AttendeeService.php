<?php

namespace App\Services\Site;

use App\Models\Attendee;

class AttendeeService
{
    public function store($request)
    {
        if ($request['middlename'] != '') {
            return back()->with('error', __('web/site/attendee.some_thing_wrong'));
        }
        return Attendee::create($request);
    }
}
