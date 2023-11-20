<?php

namespace App\Livewire;

use App\Http\Controllers\TicketController;
use App\Models\Queue;
use App\Models\ServiceReport;
use App\Models\Ticket;
use App\Models\TicketToCall;
use Livewire\Component;

class CallTickets extends Component
{
    public $tickets;
    public $queues;

    public function callNext()
    {
        $ticket = $this->tickets
            ->where('status', 'WAITING')
            ->sortByDesc(function ($ticket) {
                switch ($ticket->queue->priority) {
                    case 'MAIS DE 80 ANOS':
                        return 3;
                    case 'PRIORITÁRIO':
                        return 2;
                    case 'NORMAL':
                        return 1;
                    default:
                        return 0;
                }
            })
            ->first();

        $ticket->status = 'IN_SERVICE';
        $ticket->update();
        ServiceReport::create([
            'ticket_id' => $ticket->id,
            'queue_id' => $ticket->queue_id,
            'action' => 'CALL'
        ]);

        TicketToCall::create([
            'ticket_number' => $ticket->ticket_number,
            'queue' => $ticket->queue->name
        ]);
        return redirect()->route('ticket.in_service', $ticket->id);
    }

    public function render()
    {
        $this->queues = Queue::all();
        $tickets = Ticket::all();
        $this->tickets = $tickets->where('status', 'WAITING')
            ->sortByDesc(function ($ticket) {
                switch ($ticket->queue->priority) {
                    case 'MAIS DE 80 ANOS':
                        return 3;
                    case 'PRIORITÁRIO':
                        return 2;
                    case 'NORMAL':
                        return 1;
                    default:
                        return 0;
                }
            })
            ->values();
        return view('livewire.call-tickets');
    }
}
