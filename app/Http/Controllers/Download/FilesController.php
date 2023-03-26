<?php

namespace App\Http\Controllers\Download;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FilesController extends Controller
{
    public Request $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function downloadCsv()
    {
        $name_file = $this->request->input('name_file', 'download_month_' . date('Y_m_d'));
        $contents = $this->request->input('content_file_csv', 'no content ' . date('d/m/Y H:i:s'));

        $this->cleanOldFiles();

        $path = "{$name_file}.csv";
        Storage::put($path, $contents);
        return Storage::download($path);
    }

    public function cleanOldFiles()
    {
        $files = Storage::allFiles();
        foreach ($files as $path) {
            if (substr($path, 0, 7) == 'finance' && strpos($path, '.csv') !== false) {
                Storage::delete($path);
            }
        }
    }
}
