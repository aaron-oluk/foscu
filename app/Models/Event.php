<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Event extends Model
{
    protected $fillable = [
        'eventname',
        'description',
        'eventdate',
        'enddate',
        'event_time',
        'location',
        'image',
        'status',
    ];

    protected $casts = [
        'eventdate' => 'datetime',
        'enddate' => 'datetime',
    ];

    public function getFormattedEventDateAttribute()
    {
        return $this->eventdate ? $this->eventdate->format('d F, Y') : null;
    }

    public function getFormattedEndDateAttribute()
    {
        return $this->enddate ? $this->enddate->format('d F, Y') : null;
    }
}
