<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $table = 'ticket';

    protected $fillable = [
        'user_created',
        'title',
        'content',
        'priority',
    ];

    public function comments()
    {
        return $this->hasMany(Comments::class, 'ticket_id', 'id');
    }

    public function files()
    {
        return $this->hasMany(Attachments::class, 'ticket_id', 'id');
    }
}
