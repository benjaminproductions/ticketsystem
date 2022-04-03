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

    public const PRIORITY_URGENT = 'Urgent';
    public const PRIORITY_HIGH = 'High';
    public const PRIORITY_NORMAL = 'Normal';
    public const PRIORITY_LOW = 'Low';

    public const DEFAULT_PRIORITY = self::PRIORITY_NORMAL;

    public function comments()
    {
        return $this->hasMany(Comments::class, 'ticket_id', 'id');
    }

    public function files()
    {
        return $this->hasMany(Attachments::class, 'ticket_id', 'id');
    }

    public static function priorityList()
    {
        return [
            self::PRIORITY_URGENT,
            self::PRIORITY_HIGH,
            self::PRIORITY_NORMAL,
            self::PRIORITY_LOW,
        ];
    }
}
