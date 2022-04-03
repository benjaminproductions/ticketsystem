<?php

namespace App\Http\Controllers;

use App\Models\Attachments;
use App\Models\Comments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function add($id)
    {
        return view('add_comment', compact('id'));
    }

    public function store($id, Request $request)
    {
        Comments::create([
            'user_created' => Auth::user()->id,
            'ticket_id'    => $id,
            'content'      => $request->input('content'),
        ]);

        return redirect(route('show', ['ticket' => $id]));
    }

    public function delete($id, $ticketId)
    {
        $comments = Comments::where('id', $id);

        $comments->delete();
        return redirect(route('show', ['ticket' => $ticketId]));
    }

    public function deleteAll($id)
    {
        Comments::where('ticket_id', $id)->delete();

        return redirect(route('show', ['ticket' => $id]));
    }
}
