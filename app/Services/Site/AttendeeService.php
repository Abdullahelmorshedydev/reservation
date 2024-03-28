<?php

namespace App\Services\Site;

use App\Models\Attendee;

class AttendeeService
{
    public function store($request)
    {
        return Attendee::create($request);
    }
}
