<?php

namespace App\Http\Controllers;

use App\Models\Attachments;
use App\Models\Comments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class FileController extends Controller
{
    public function uploadTicketFile(Request $request, $ticketId)
    {
        $filePath = Str::random(10) . '.' . $request->file('file')->clientExtension();
        $request->file('file')->storeAs('', $filePath);

        Attachments::create([
            'user_created' => Auth::user()->name,
            'ticket_id'    => $ticketId,
            'path'         => $filePath,
        ]);

        return redirect(route('show', ['ticket' => $ticketId]));
    }

    public function uploadCommentFile(Request $request, $commentId)
    {
        $filePath = Str::random(10) . '.' . $request->file('file')->clientExtension();
        $request->file('file')->storeAs('', $filePath);

        Attachments::create([
            'user_created' => Auth::user()->name,
            'comment_id'   => $commentId,
            'path'         => $filePath,
        ]);

        $comment = Comments::where('id', $commentId)->first();

        return redirect(route('show', ['ticket' => $comment->ticket_id]));
    }

    public function deleteFile($id)
    {
        $file = Attachments::where('id', $id)->first();
        Storage::delete($file->path);
        $file->delete();
        return back();
    }

    public function downloadFile($name)
    {
        return Storage::download($name);
    }
}
