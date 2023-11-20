<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrintReport extends Model
{
    use HasFactory;

    protected $fillable = [
        'ticket_id',
        'queue_id',
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
