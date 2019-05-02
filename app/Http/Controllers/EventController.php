<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Event;
use App\Location;
use App\TicketType;
use App\Schedule;

class EventController extends Controller
{

    public function index()
    {
        return Event::all();
    }

    public function create(Request $request)
    {
        $event = new Event();
        $event->id = $this->generateUuid();
        $event->name = $request->input('name');
        $event->ticket_type_id = $request->input('ticket_type_id');
        $event->location_id = $request->input('location_id');
        $event->schedule_id = $request->input('schedule_id');

        if ($event->save()) {
            return response()->json([
                'success' => true
            ], 201);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Save Item Failed'
            ], 204);
        }
    }

    public function getInfo($id)
    {
        $event = Event::find($id);
        if ($event != null) {
            $location = Location::find($event->location_id);
            $ticketType = TicketType::find($event->ticket_type_id);
            $schedule = Schedule::find($event->schedule_id);
            $data = [
                'id' => $event->id,
                'name' => $event->name,
                'location' => $location->id,
                'start_time' => $schedule->time_start,
                'end_time' => $schedule->time_end,
                'start_date' => $schedule->start_date,
                'end_date' => $schedule->end_date,
                'type' => $ticketType->type,
                'price' => $ticketType->price,
                'quota' => $ticketType->quota
            ];
            return response()->json([
                'data' => $data,
                'success' => true
            ]);
        }
        return response()->json([
            'success' => false,
            'message' => "Can not find event with id = ".$id
        ]);
    }
}
