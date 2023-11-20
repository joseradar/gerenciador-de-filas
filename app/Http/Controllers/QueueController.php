<?php

namespace App\Http\Controllers;

use App\Models\Queue;
use Illuminate\Http\Request;

class QueueController extends Controller
{
    public function index()
    {
        $queues = Queue::all();

        return view('queues', compact('queues'));
    }

    public function panel()
    {
        $queues = Queue::all();

        return view('panel', compact('queues'));
    }
}
