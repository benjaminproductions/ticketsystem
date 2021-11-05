<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TicketController extends Controller
{
    const COMMENT_PATH = 'comments/';

    public function index()
    {
        $tickets = Ticket::get();
        return view('index', compact('tickets'));
    }

    public function show(Ticket $ticket)
    {
        $commentPath = self::COMMENT_PATH . $ticket->id;
        if (Storage::exists($commentPath)) {
            $comments = Storage::get($commentPath);
            $comments = json_decode($comments, true);
            return view('show', compact('ticket', 'comments'));
        }

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
        $comments = Storage::exists(self::COMMENT_PATH . $ticket->id);
        return view('edit', compact('ticket', 'comments'));
    }

    public function addComment($id)
    {
        return view('add_comment', compact('id'));
    }

    public function storeComment($id, Request $request)
    {
        $author = $request->input('author');
        if (empty($author)) {
            $author = 'Anonym';
        }
        $data = [
            [
                'author'  => $author,
                'content' => $request->input('content'),
            ],
        ];
        $path = self::COMMENT_PATH . $id;
        if (Storage::exists($path)) {
            $array = Storage::get($path);
            $array = json_decode($array, true);
            $data = array_merge($array, $data);
        }
        $data = json_encode($data);

        Storage::put($path, $data);
        return redirect(route('show', ['ticket' => $id]));
    }

    public function deleteComments($id)
    {
        Storage::delete(self::COMMENT_PATH . $id);
        return redirect(route('show', ['ticket' => $id]));
    }
}
