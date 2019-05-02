<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Event;
use App\Location;
use App\TicketType;

class EventController extends Controller
{

    public function index()
    {
        return Schedule::all();
    }

    public function create(Request $request)
    {
        $event = new Event();
        $event->id = $this->generateUuid();
        $event->name = $request->input('name');
        $event->ticket_type_id = $request->input('ticket_type_id');
        $event->location_id = $request->input('location_id');

        if ($event->save()) {
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
