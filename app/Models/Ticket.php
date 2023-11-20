<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'ticket_number',
        'status',
        'queue_id',
    ];

    public function queue()
    {
        return $this->belongsTo(Queue::class);
    }

    public function printReports()
    {
        return $this->hasMany(PrintReport::class);
    }
}
