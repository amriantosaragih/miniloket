<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TicketType;

class TicketTypeController extends Controller
{
    public function create(Request $request)
    {
        $ticketType = new TicketType();
        $ticketType->id = $this->generateUuid();
        $ticketType->type = $request->input('type');
        $ticketType->price = $request->input('price');
        $ticketType->quota = $request->input('quota');
        if ($ticketType->save()) {
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

    public function getTotalQuotaTicket($id) {
        $ticket = TicketType::find($id);
        return $ticket->quota;
    }

    public function getPrice($id) {
        $ticket = TicketType::find($id);
        return $ticket->price;
    }

    public function updateQuotaTicket($id, $quantity) {
        $ticket = TicketType::find($id);
        $ticket->quota = $ticket->quota - $quantity;
        if ($ticket->save()) {
            return true;
        }
        return false;
    }
}
