<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceReport extends Model
{
    use HasFactory;

    protected $fillable = [
        'time',
        'ticket_id',
        'queue_id',
        'action'
    ];

    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }
    public function queue()
    {
        return $this->belongsTo(Queue::class);
    }
}
