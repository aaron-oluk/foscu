<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ResourceFile;
use App\Services\ResourceFileSyncService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ResourceFileController extends Controller
{
    public function index(Request $request)
    {
        $query = ResourceFile::with('uploader')->orderByDesc('created_at');

        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        $files = $query->paginate(20)->withQueryString();
        $categories = ResourceFile::CATEGORIES;
        $lastSyncedAt = app(ResourceFileSyncService::class)->lastSyncedAt();

        return view('admin.files.index', compact('files', 'categories', 'lastSyncedAt'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category' => 'required|in:'.implode(',', array_keys(ResourceFile::CATEGORIES)),
            'file' => 'required|file|max:51200|mimes:pdf,xls,xlsx,ppt,pptx,txt,zip,jpg,jpeg,png',
            'is_public' => 'nullable|boolean',
        ]);

        $uploaded = $request->file('file');
        $originalName = $uploaded->getClientOriginalName();
        $safeName = now()->format('YmdHis').'_'.Str::slug(pathinfo($originalName, PATHINFO_FILENAME)).'.'.$uploaded->getClientOriginalExtension();
        $path = $uploaded->storeAs('resource-files', $safeName, 'public');

        $publicCopy = public_path('briefs/'.$safeName);
        @copy(Storage::disk('public')->path($path), $publicCopy);

        ResourceFile::create([
            'title' => ResourceFile::titleFromFilename($originalName),
            'original_filename' => ResourceFile::stripNumberPrefix($originalName),
            'stored_path' => $path,
            'disk' => 'public',
            'mime_type' => $uploaded->getMimeType(),
            'size' => $uploaded->getSize(),
            'category' => $request->category,
            'is_public' => $request->has('is_public'),
            'uploaded_by' => $request->user()->id,
        ]);

        return redirect()->route('admin.files.index')->with('message', 'File uploaded successfully.');
    }

    public function sync(ResourceFileSyncService $sync)
    {
        $result = $sync->sync();

        $message = "Sync complete. Scanned {$result['scanned']} file(s), added {$result['added']}, skipped {$result['skipped']} already tracked.";

        return redirect()->route('admin.files.index')->with('message', $message);
    }

    public function download(ResourceFile $file)
    {
        if (! $file->existsOnDisk()) {
            abort(404, 'File not found on disk.');
        }

        return Storage::disk($file->disk)->download($file->stored_path, $file->download_name);
    }

    public function edit(ResourceFile $file)
    {
        $categories = ResourceFile::CATEGORIES;

        return view('admin.files.edit', compact('file', 'categories'));
    }

    public function update(Request $request, ResourceFile $file)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'original_filename' => 'required|string|max:255',
            'category' => 'required|in:'.implode(',', array_keys(ResourceFile::CATEGORIES)),
            'is_public' => 'nullable|boolean',
        ]);

        $file->update([
            'title' => ResourceFile::stripNumberPrefix($data['title']),
            'original_filename' => ResourceFile::withExtension($data['original_filename'], $file->original_filename ?: $file->stored_path),
            'category' => $data['category'],
            'is_public' => $request->has('is_public'),
        ]);

        return redirect()->route('admin.files.index')->with('message', 'File renamed successfully.');
    }

    public function destroy(ResourceFile $file)
    {
        if ($file->existsOnDisk()) {
            Storage::disk($file->disk)->delete($file->stored_path);
        }

        $publicCopy = public_path('briefs/'.basename($file->stored_path));
        if (is_file($publicCopy)) {
            @unlink($publicCopy);
        }

        $file->delete();

        return redirect()->route('admin.files.index')->with('message', 'File deleted.');
    }
}
