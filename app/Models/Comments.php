<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    protected $fillable = [
        'user_created',
        'ticket_id',
        'content',
    ];

    public function files()
    {
        return $this->hasMany(Attachments::class, 'comment_id', 'id');
    }
}
