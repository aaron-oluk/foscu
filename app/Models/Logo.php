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

    // Uploaded logos are stored in storage/app/public/ (path like 'logos/file.png')
    // Seeded logos live directly in public/ (path like 'images/CAES.png')
    public function getImageUrlAttribute(): ?string
    {
        if (!$this->image) return null;

        if (str_starts_with($this->image, 'logos/')) {
            return asset('storage/' . $this->image);
        }

        return asset($this->image);
    }
}
