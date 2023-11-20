<?php

namespace App\Livewire;

use App\Models\ServiceReport;
use App\Models\Ticket;
use Livewire\Component;

class Actions extends Component
{

    public $ticket;

    public function conclude($ticketId)
    {
        $ticket = Ticket::find($ticketId);
        $ticket->status = "CONCLUDE";

        ServiceReport::create([
            'time' => now()->diffInMinutes($ticket->updated_at),
            'ticket_id' => $ticket->id,
            'queue_id' => $ticket->queue_id,
            'action' => 'CONCLUDE'
        ]);

        $ticket->update();

        return redirect()->route('ticket.call');
    }

    public function absent($ticketId)
    {
        $ticket = Ticket::find($ticketId);
        $ticket->status = "ABSENT";
        ServiceReport::create([
            'time' => now()->diffInMinutes($ticket->updated_at),
            'ticket_id' => $ticket->id,
            'queue_id' => $ticket->queue_id,
            'action' => 'ABSENT'
        ]);
        $ticket->update();

        return redirect()->route('ticket.call');
    }
    public function mount($ticketId)
    {
        $this->ticket = Ticket::find($ticketId);
    }

    public function render()
    {

        return view('livewire.actions');
    }
}
