<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Logo extends Model
{
    protected $fillable = [
        'partner_name',
        'website_url',
        'image',
        'status',
        'display_order',
    ];

    protected $casts = [
        'upload_date' => 'datetime',
    ];
}
