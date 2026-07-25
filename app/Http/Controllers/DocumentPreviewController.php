<?php
// app/Http/Controllers/DocumentPreviewController.php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class DocumentPreviewController extends Controller
{
    /**
     * Redirect ke Google Drive preview.
     * Route: GET /documents/{document}/preview
     */
    public function preview(Document $document): RedirectResponse
    {
        // Cek akses untuk dokumen terbatas
        if ($document->is_restricted && !Auth::check()) {
            return redirect()->route('login')
                ->with('intended_document', $document->id);
        }

        // Logging views (opsional)
        // DocumentView::create(['document_id' => $document->id, 'ip' => request()->ip()]);

        return redirect($document->preview_url);
    }

    /**
     * Force download via Google Drive export.
     * Route: GET /documents/{document}/download
     */
    public function download(Document $document): RedirectResponse
    {
        if ($document->is_restricted && !Auth::check()) {
            return redirect()->route('login');
        }

        return redirect($document->download_url);
    }
}