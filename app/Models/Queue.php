<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Queue extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'minNum',
        'maxNum',
        'initial',
        'last_number_issued',
        'priority',
    ];

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }

    public function printReports()
    {
        return $this->hasMany(PrintReport::class);
    }
}
