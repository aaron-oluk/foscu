<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;

class ResourceFile extends Model
{
    protected $fillable = [
        'title',
        'original_filename',
        'stored_path',
        'disk',
        'mime_type',
        'size',
        'category',
        'is_public',
        'uploaded_by',
    ];

    protected $casts = [
        'is_public' => 'boolean',
        'size' => 'integer',
    ];

    public const CATEGORIES = [
        'papers' => 'Papers',
        'reports' => 'Reports',
        'research' => 'Research briefs',
        'policy' => 'Policy briefs',
        'articles' => 'Articles',
        'internal' => 'Internal',
        'other' => 'Other',
    ];

    public function uploader(): BelongsTo
    {
        return $this->belongsTo(User::class, 'uploaded_by');
    }

    public function getFormattedSizeAttribute(): string
    {
        $bytes = (int) $this->size;
        if ($bytes >= 1048576) {
            return number_format($bytes / 1048576, 1).' MB';
        }
        if ($bytes >= 1024) {
            return number_format($bytes / 1024, 1).' KB';
        }

        return $bytes.' B';
    }

    public function getExtensionAttribute(): string
    {
        return strtoupper(pathinfo($this->original_filename, PATHINFO_EXTENSION) ?: 'FILE');
    }

    public function getDisplayTitleAttribute(): string
    {
        return static::stripNumberPrefix($this->title);
    }

    public function getDisplayFilenameAttribute(): string
    {
        return static::stripNumberPrefix($this->original_filename);
    }

    public function getDownloadNameAttribute(): string
    {
        $name = $this->display_filename;
        $extension = strtolower(pathinfo($this->original_filename, PATHINFO_EXTENSION) ?: pathinfo($this->stored_path, PATHINFO_EXTENSION));

        if ($extension && strtolower(pathinfo($name, PATHINFO_EXTENSION)) !== $extension) {
            $name .= '.'.$extension;
        }

        return $name;
    }

    public static function stripNumberPrefix(string $name): string
    {
        $name = trim($name);
        $name = preg_replace('/^(no\.?\s*)\d+\s+/i', '', $name) ?? $name;
        $name = preg_replace('/^\d+(?=[A-Za-z])/', '', $name) ?? $name;
        $name = preg_replace('/\s+/', ' ', $name) ?? $name;

        return trim($name);
    }

    public static function titleFromFilename(string $filename): string
    {
        $name = pathinfo($filename, PATHINFO_FILENAME);
        $name = static::stripNumberPrefix($name);
        $name = preg_replace('/[_-]+/', ' ', $name) ?? $name;
        $name = preg_replace('/\s+/', ' ', $name) ?? $name;

        return trim($name);
    }

    public static function withExtension(string $name, string $fallbackName = ''): string
    {
        $name = static::stripNumberPrefix($name);
        $extension = strtolower(pathinfo($name, PATHINFO_EXTENSION) ?: pathinfo($fallbackName, PATHINFO_EXTENSION));

        if ($extension && strtolower(pathinfo($name, PATHINFO_EXTENSION)) !== $extension) {
            $name = rtrim($name, '.').'.'.$extension;
        }

        return $name;
    }

    public function existsOnDisk(): bool
    {
        return Storage::disk($this->disk)->exists($this->stored_path);
    }

    public function absolutePath(): string
    {
        return Storage::disk($this->disk)->path($this->stored_path);
    }
}
