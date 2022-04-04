<?php

namespace App\Http\Controllers;

use App\Models\Attachments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class FileController extends Controller
{
    public function uploadFile(Request $request, $id)
    {
        if (! empty($request->hasFile('ticket_file'))) {
            $file = $request->file('ticket_file');

            $fileName = Str::random(10) . '.' . $file->clientExtension();
            $file->storeAs('', $fileName);

            Attachments::create([
                'user_created' => Auth::user()->id,
                'ticket_id'    => $id,
                'path'         => $fileName,
            ]);

            return back();
        }

        if (! empty($request->hasFile('comment_file'))) {
            $file = $request->file('comment_file');

            $fileName = Str::random(10) . '.' . $file->clientExtension();
            $file->storeAs('', $fileName);

            Attachments::create([
                'user_created' => Auth::user()->id,
                'comment_id'   => $id,
                'path'         => $fileName,
            ]);

            return back();
        }

        return 404;
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
