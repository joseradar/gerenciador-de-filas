<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketToCall extends Model
{
    use HasFactory;
    protected $fillable = [
        'ticket_number',
        'queue'
    ];
}
