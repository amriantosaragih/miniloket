<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaction;
use App\Event;
use App\Customer;
use App\TicketType;
use App\Http\Controllers\TicketTypeController;

class TransactionController extends Controller
{

    public function purchase(Request $request)
    {
        $transaction = new Transaction();
        $transaction->id = $this->generateUuid();
        $transaction->customer_id = $request->input('customer_id');
        $transaction->event_id = $request->input('event_id');
        $transaction->quantity = $request->input('quantity');

        $event_id = $transaction->event_id;
        $event = Event::find($event_id);
        $ticketId = $event->ticket_type_id;
        $quantity = $transaction->quantity;
        $transaction->total_price = $this->totalPrice($ticketId, $quantity);

        $status = $this->ticketStatus($ticketId, $quantity); 
        if ($status=="Ticket Available" && $transaction->save()) {
            return response()->json([
                'success' => true
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => $status
            ]);
        }
    }

    public function ticketStatus($ticketId, $quantity) {
        $ticketTypeController = new TicketTypeController();
        $totalQuotaTicket = $ticketTypeController->getTotalQuotaTicket($ticketId);
        if ($quantity > 0) {
            if ($totalQuotaTicket >= $quantity) {
                if ($ticketTypeController->updateQuotaTicket($ticketId, $quantity)) {
                    return "Ticket Available";
                } else {
                    return "Update Ticket Failed";
                }
            }
        } else {
            return "Quantity must bigger than zero";
        }
        return "Ticket Not Available";
    }

    public function totalPrice($ticketId, $quantity) {
        $ticketTypeController = new TicketTypeController();
        $total = $quantity * $ticketTypeController->getPrice($ticketId);
        return $total;
    }

    public function getInfo($id) {
        $transaction = Transaction::find($id);
        if ($transaction != null) {
            $customer = Customer::find($transaction->customer_id);
            $event = Event::find($transaction->event_id);
            $ticketType = TicketType::find($event->ticket_type_id);
            $data = [
                'id' => $transaction->id,
                'customer_id' => $customer->id,
                'customer_name' => $customer->name,
                'event_name' => $event->name,
                'type' => $ticketType->type,
                'price' => $ticketType->price,
                'quantity' => $transaction->quantity,
                'total_price' => $transaction->total_price
            ];
            return response()->json([
                'data' => $data,
                'success' => true
            ]);
        }
        return response()->json([
            'success' => false,
            'message' => "Can not find transaction with id = ".$id
        ]);
    }
}
