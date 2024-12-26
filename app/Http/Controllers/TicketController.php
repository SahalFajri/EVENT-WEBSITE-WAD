<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function index()
    {
        return view('user.ticket.index', ['title' => 'Ticket']);
    }

    public function show(Ticket $ticket)
    {
        return view('user.ticket.show', ['title' => 'Detail Ticket']);
    }
}
