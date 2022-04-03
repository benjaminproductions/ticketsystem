<?php

namespace App\Http\Controllers;

use App\Models\Attachments;
use App\Models\Comments;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
    public function index()
    {
        if (empty(Auth::user())) {
            return redirect(route('login'));
        }

        $tickets = Ticket::get();

        return view('index', compact('tickets'));
    }

    public function show(Ticket $ticket)
    {
        $comments = Comments::where('ticket_id', $ticket->id)->get();
        $files = Attachments::where('ticket_id', $ticket->id)->get();

        return view('show', compact('ticket', 'comments', 'files'));
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $ticket = Ticket::create([
            'user_created' => Auth::user()->id,
            'title'        => $request->input('title'),
            'content'      => $request->input('content'),
            'priority'     => $request->input('priority'),
        ]);

        return redirect(route('show', ['ticket' => $ticket->id]));
    }

    public function delete(Ticket $ticket)
    {
        $ticket->delete();
    }

    public function edit(Ticket $ticket)
    {
        $comments = Comments::where('ticket_id', $ticket->id)->get();

        return view('edit', compact('ticket', 'comments'));
    }

    public function storeEditedTicket(Ticket $ticket, Request $request)
    {
        $ticket->title = $request->input('title');
        $ticket->priority = $request->input('priority');
        $ticket->content = $request->input('content');
        $ticket->save();

        return redirect(route('show', ['ticket' => $ticket->id]));
    }
}
