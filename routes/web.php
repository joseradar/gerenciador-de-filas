<?php

use App\Http\Controllers\QueueController;
use App\Http\Controllers\TicketController;
use App\Livewire\Actions;
use App\Livewire\CallTickets;
use App\Models\PrintReport;
use App\Models\Queue;
use App\Models\ServiceReport;
use App\Models\Ticket;
use App\Models\TicketToCall;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('filas', [QueueController::class, 'index'])->name('queue.index');
Route::get('painel', [QueueController::class, 'panel'])->name('queue.panel');
Route::get('ticket/imprimir/{queueId}', [TicketController::class, 'print'])->name('ticket.print');
Route::get('chamar', CallTickets::class)->name('ticket.call');
Route::get('ticket/{ticketId}/em-atendimento', Actions::class)->name('ticket.in_service');
Route::get('verificar/senhas', function () {
    $ticket = TicketToCall::first();

    if (!$ticket) {
        return response()->json([
            'ticket_number' => null,
            'queue' => null,
        ]);
    } else {
        $ticket_number = $ticket->ticket_number;
        $queue = $ticket->queue;

        $ticket->delete();
        return response()->json([
            'ticket_number' => $ticket_number,
            'queue' => $queue,
        ]);
    }
})->name('call.verify');

Route::get('relatorios', function () {
    $queues = Queue::all();
    foreach ($queues as $queue) {
        $reports = ServiceReport::whereDate('created_at', now()->format('Y-m-d'))->where('action', 'CONCLUDE')->where('queue_id', $queue->id)->get();
        $total = 0;
        $count = 0;
        foreach ($reports as $report) {
            $total += $report->time;
            $count++;
        }
        $queue->average = $count > 0 ? $total / $count : 0;
        $queue->countTickets = PrintReport::whereDate('created_at', now()->format('Y-m-d'))->where('queue_id', $queue->id)->count();
    }
    return view('reports', compact('queues'));
})->name('reports.index');
