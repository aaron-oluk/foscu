<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RecentEvent extends Model
{
    protected $fillable = [
        'eventname',
        'eventdate',
    ];

    protected $casts = [
        'eventdate' => 'datetime',
    ];

    public function getFormattedEventDateAttribute()
    {
        return $this->eventdate ? $this->eventdate->format('d F, Y') : null;
    }
}
