<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;

class SystemBackup extends Model
{
    protected $fillable = [
        'filename',
        'stored_path',
        'size',
        'type',
        'status',
        'notes',
        'created_by',
        'completed_at',
    ];

    protected $casts = [
        'size' => 'integer',
        'completed_at' => 'datetime',
    ];

    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function getFormattedSizeAttribute(): string
    {
        $bytes = (int) $this->size;
        if ($bytes >= 1073741824) {
            return number_format($bytes / 1073741824, 2).' GB';
        }
        if ($bytes >= 1048576) {
            return number_format($bytes / 1048576, 1).' MB';
        }
        if ($bytes >= 1024) {
            return number_format($bytes / 1024, 1).' KB';
        }

        return $bytes.' B';
    }

    public function existsOnDisk(): bool
    {
        return Storage::disk('local')->exists($this->stored_path);
    }

    public function absolutePath(): string
    {
        return Storage::disk('local')->path($this->stored_path);
    }
}
