<?php

use Illuminate\Support\Facades\Route;
use Livewire\Livewire;
use App\Models\Document;
use Illuminate\Support\Facades\Storage;
use App\Livewire\UploadIjazah;

/* NOTE: Do Not Remove
| Livewire asset handling if using sub folder in domain
*/
Livewire::setUpdateRoute(function ($handle) {
    return Route::post(config('app.asset_prefix') . '/livewire/update', $handle);
});

Livewire::setScriptRoute(function ($handle) {
    return Route::get(config('app.asset_prefix') . '/livewire/livewire.js', $handle);
});
/* END */

Route::get('/', function () {
    return view('landing');
});

Route::get('/upload-ijazah', UploadIjazah::class)->name('upload-ijazah');

// Route untuk menampilkan gambar ijazah dari storage private
Route::get('/ijazah/{filename}', function (string $filename) {
    // Try different possible paths (data/ijazah is common)
    $paths = [
        storage_path('app/data/ijazah/' . $filename),
        storage_path('app/ijazah/' . $filename),
        storage_path('app/private/ijazah/' . $filename),
    ];
    
    foreach ($paths as $path) {
        if (file_exists($path)) {
            return response()->file($path);
        }
    }
    
    // Debug: log the attempted paths
    \Log::info('Ijazah file not found', [
        'filename' => $filename,
        'attempted_paths' => $paths,
        'storage_path' => storage_path(),
    ]);
    
    abort(404);
})->where('filename', '.*');


/**
 * =====================================================
 * AUTH ROUTES
 * =====================================================
 */
Route::middleware(['auth'])->group(function () {

    /**
     * =====================================================
     * DOWNLOAD
     * =====================================================
     */
    Route::get(
        '/admin/documents/{document}/download',
        \App\Http\Controllers\DocumentDownloadController::class
    )->name('documents.download');

    /**
     * =====================================================
     * PREVIEW (PDF via iframe)
     * =====================================================
     */
    Route::get('/admin/documents/{document}/preview', function (Document $document) {

        // Validasi metadata
        if (! $document->disk || ! $document->file_path) {
            abort(404, 'File tidak valid');
        }

        $disk = Storage::disk($document->disk);

        // Pastikan file benar-benar ada
        if (! $disk->exists($document->file_path)) {
            abort(404, 'File tidak ditemukan');
        }

        return response()->file(
            $disk->path($document->file_path),
            [
                'Content-Type'        => $document->mime_type ?? 'application/pdf',
                'Content-Disposition'=> 'inline',
                'X-Frame-Options'     => 'SAMEORIGIN',
            ]
        );
    })->name('documents.preview');
});
