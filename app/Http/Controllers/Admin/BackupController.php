<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SystemBackup;
use App\Services\SystemBackupService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BackupController extends Controller
{
    public function index()
    {
        $backups = SystemBackup::with('creator')->orderByDesc('created_at')->paginate(15);

        return view('admin.backups.index', compact('backups'));
    }

    public function store(Request $request, SystemBackupService $service)
    {
        try {
            $backup = $service->create($request->user(), 'full');

            return redirect()
                ->route('admin.backups.index')
                ->with('message', 'Backup completed: '.$backup->filename);
        } catch (\Throwable $e) {
            return redirect()
                ->route('admin.backups.index')
                ->with('error', 'Backup failed: '.$e->getMessage());
        }
    }

    public function download(SystemBackup $backup)
    {
        if ($backup->status !== 'completed' || ! $backup->existsOnDisk()) {
            abort(404, 'Backup file is not available.');
        }

        return Storage::disk('local')->download($backup->stored_path, $backup->filename);
    }

    public function destroy(SystemBackup $backup)
    {
        if ($backup->existsOnDisk()) {
            Storage::disk('local')->delete($backup->stored_path);
        }

        $backup->delete();

        return redirect()->route('admin.backups.index')->with('message', 'Backup deleted.');
    }
}
