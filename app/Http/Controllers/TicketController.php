<?php

namespace App\Http\Controllers;

use App\Models\Comments;
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
        $comments = Comments::where('ticket_id', $ticket->id)->get();

        return view('show', compact('ticket', 'comments'));
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

        if (empty($name)) {
            $name = 'Anonym';
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
    }

    public function edit(Ticket $ticket)
    {
        $comments = Comments::where('ticket_id', $ticket->id)->get();

        return view('edit', compact('ticket', 'comments'));
    }

    public function addComment($id)
    {
        return view('add_comment', compact('id'));
    }

    public function storeComment($id, Request $request)
    {
        Comments::create([
            'user_created' => $request->input('author', 'anonym'),
            'ticket_id'    => $id,
            'content'      => $request->input('content'),
        ]);

        return redirect(route('show', ['ticket' => $id]));
    }

    public function deleteComments($id)
    {
        Comments::where('ticket_id', $id)->delete();

        return redirect(route('show', ['ticket' => $id]));
    }
}
