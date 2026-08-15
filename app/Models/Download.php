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

    protected static function booted(): void
    {
        static::saving(function (Download $download) {
            if (! is_string($download->filename) || trim($download->filename) === '') {
                return false;
            }
        });
    }

    public function incrementDownloads()
    {
        $this->increment('downloads');
    }
}
