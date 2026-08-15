<?php

namespace App\Http\Controllers;

use App\Models\Download;
use App\Models\ResourceFile;
use Illuminate\Http\Request;

class DownloadController extends Controller
{
    public function trackDownload(Request $request)
    {
        $filename = $request->get('file');
        
        // Track or increment download count
        $download = Download::firstOrCreate(
            ['filename' => $filename],
            ['downloads' => 0]
        );
        
        $download->incrementDownloads();
        
        // Define the file path - handle both direct filenames and paths with directories
        if (str_contains($filename, '/')) {
            $filePath = public_path($filename);
        } else {
            $possiblePaths = [
                public_path('briefs/' . $filename),
                public_path('briefs/reports/' . $filename),
                public_path('briefs/articles/' . $filename),
                storage_path('app/public/resource-files/' . $filename),
            ];

            $filePath = null;
            foreach ($possiblePaths as $path) {
                if (file_exists($path)) {
                    $filePath = $path;
                    break;
                }
            }

            if (!$filePath) {
                return abort(404, 'File not found');
            }
        }
        
        if (file_exists($filePath)) {
            $basename = basename($filePath);
            $record = ResourceFile::query()
                ->where('stored_path', $basename)
                ->orWhere('stored_path', 'like', '%/'.$basename)
                ->orWhere('original_filename', $filename)
                ->orWhere('original_filename', $basename)
                ->first();

            $downloadAs = $record?->download_name ?? ResourceFile::stripNumberPrefix($basename);

            return response()->download($filePath, $downloadAs);
        }
        
        return abort(404, 'File not found');
    }
}
