<?php

namespace App\Http\Controllers;

use App\Models\PrintReport;
use App\Models\Queue;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function print($queueId)
    {
        $queue = Queue::find($queueId);
        if ($queue->last_number_issued <= $queue->maxNum || $queue->last_number_issued == null) {
            $queue->last_number_issued++;
        } else {
            $queue->last_number_issued = $queue->minNum;
        }
        $queue->update();

        $ticketNumber = $queue->initial . str_pad($queue->last_number_issued, 3, "0", STR_PAD_LEFT);
        $ticket = $queue->tickets()->create([
            'ticket_number' => $ticketNumber,
            'status' => 'WAITING',
        ]);

        PrintReport::create([
            'ticket_id' => $ticket->id,
            'queue_id' => $queue->id,
        ]);

        return response()->json([
            'ticket_number' => $ticket->ticket_number,
            'queue_name' => $queue->name,
            'date' => $ticket->created_at->format('d/m/Y'),
            'time' => $ticket->created_at->format('H:i:s'),
        ]);
    }
}
