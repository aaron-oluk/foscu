<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Download extends Model
{
    protected $fillable = [
        'filename',
        'downloads',
    ];

    protected $casts = [
        'downloads' => 'integer',
    ];

    public function incrementDownloads()
    {
        $this->increment('downloads');
    }
}
