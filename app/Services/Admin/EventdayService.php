<?php

namespace App\Services\Admin;

use App\Models\Eventday;
use Exception;
use Illuminate\Support\Facades\DB;

class EventdayService
{
    public function index()
    {
        return Eventday::paginate();
    }

    public function store($request)
    {
        try {
            DB::beginTransaction();
            $eventday = Eventday::create($request);
            $eventday->movies()->attach($request['movies']);
            DB::commit();
            return true;
        } catch (Exception $e) {
            DB::rollBack();
            return $e->getMessage();
        }
    }

    public function update($eventday, $request)
    {
        try {
            DB::beginTransaction();
            $eventday->update($request);
            $eventday->movies()->sync($request['movies']);
            DB::commit();
            return true;
        } catch (Exception $e) {
            DB::rollBack();
            return $e->getMessage();
        }
    }

    public function destroy($eventday)
    {
        try {
            DB::beginTransaction();
            $eventday->movies()->detach();
            $eventday->delete();
            DB::commit();
            return true;
        } catch (Exception $e) {
            DB::rollBack();
            return $e->getMessage();
        }
    }
}
