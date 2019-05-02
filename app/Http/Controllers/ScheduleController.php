<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Schedule;

class ScheduleController extends Controller
{
    public function create(Request $request)
    {
        $schedule = new Schedule();
        $schedule->id = $this->generateUuid();
        $schedule->time_start = $request->input('time_start');
        $schedule->time_end = $request->input('time_end');
        $schedule->start_date = $request->input('start_date');
        $schedule->end_date = $request->input('end_date');

        if ($schedule->save()) {
            return response()->json([
                'success' => true
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Save Item Failed'
            ]);
        }
    }
}
