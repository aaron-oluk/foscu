<?php

namespace App\Http\Controllers;

use App\Models\Download;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
            return response()->download($filePath);
        }
        
        return abort(404, 'File not found');
    }
}
