<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function index()
    {
        $tickets = Ticket::get();
        return view('index', compact('tickets'));
    }

    public function show(Ticket $ticket)
    {
        return view('show', compact('ticket'));
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $name = $request->input('name');
        $title = $request->input('title');
        $content = $request->input('content');

        if (empty($name)){
            $name =  'anonym';
        }

        $ticket = Ticket::create([
            'user_created' => $name,
            'title'        => $title,
            'content'      => $content,
        ]);

        return redirect(route('show', ['ticket' => $ticket->id]));
    }

    public function delete($id)
    {
        $ticket = Ticket::where('id', $id);
        $ticket->delete();

        return redirect(route('index'));
    }
}
