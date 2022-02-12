<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attachments extends Model
{
    protected $fillable = [
        'user_created',
        'ticket_id',
        'comment_id',
        'path',
    ];
}
