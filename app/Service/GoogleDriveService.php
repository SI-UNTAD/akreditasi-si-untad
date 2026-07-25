<?php
// app/Services/GoogleDriveService.php

namespace App\Services;

use App\Models\Document;

class GoogleDriveService
{
    /**
     * Ambil URL preview berdasarkan file_id.
     * Gunakan di blade: {!! $gdrive->previewUrl($document) !!}
     */
    public function previewUrl(Document $document): ?string
    {
        return $document->preview_url;
    }

    /**
     * Ambil URL download (force download).
     */
    public function downloadUrl(Document $document): ?string
    {
        return $document->download_url;
    }

    /**
     * Embed URL khusus untuk Google Docs Viewer (PDF/DOCX di iframe).
     * Berguna jika file_id tidak support preview langsung.
     */
    public function embedUrl(Document $document): ?string
    {
        if (!$document->google_drive_file_id) return null;
        $rawUrl = "https://drive.google.com/file/d/{$document->google_drive_file_id}/view";
        return "https://docs.google.com/viewer?url=" . urlencode($rawUrl) . "&embedded=true";
    }

    /**
     * Thumbnail/preview image untuk PDF (menggunakan Google Drive thumbnail API).
     */
    public function thumbnailUrl(Document $document, int $size = 200): ?string
    {
        if (!$document->google_drive_file_id) return null;
        return "https://drive.google.com/thumbnail?id={$document->google_drive_file_id}&sz=s{$size}";
    }
}