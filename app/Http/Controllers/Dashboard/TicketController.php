<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;


class TicketController extends Controller
{
    public function index()
    {
        $tickets = Ticket::all();

        return view('dashboard.ticket.index', compact('tickets'));
    }

    public function create()
    {
        return view('dashboard.ticket.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'stock' => 'required|integer|min:1',
            'price' => 'required|numeric|min:1',
            'description' => 'required|string',
            'is_available' => 'required|boolean',
        ]);

        Ticket::create($validatedData);
        return redirect()->route('dashboard.ticket.index')->with('success', 'Ticket Berhasil Ditambahkan!');
    }

    public function show(Ticket $ticket)
    {
        return view('dashboard.ticket.show', compact('ticket'));
    }

    public function edit(Ticket $ticket)
    {
        return view('dashboard.ticket.edit', compact('ticket'));
    }

    public function update(Request $request, Ticket $ticket)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'stock' => 'required|integer|min:1',
            'price' => 'required|numeric|min:1',
            'description' => 'required|string',
            'is_available' => 'required|boolean',
        ]);

        $ticket->update($validatedData);
        return redirect()->route('dashboard.ticket.index')->with('success', 'Ticket Berhasil Diubah!');
    }

    public function destroy(Ticket $ticket)
    {
        $ticket->delete();
        return redirect()->route('dashboard.ticket.index')->with('success', 'Ticket Berhasil Dihapus!');
    }

    public function download_pdf()
    {
        $tickets = Ticket::latest()->get();
        $pdf = Pdf::loadView('dashboard.ticket.pdf', compact('tickets'));
        return $pdf->stream('tickets.pdf');
    }
}
