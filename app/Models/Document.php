<?php
// app/Models/Document.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Criteria;


class Document extends Model
{
    use SoftDeletes;

    // Konstanta PPEPP — gunakan ini di seluruh codebase, bukan magic string
    const PPEPP_CATEGORIES = [
        'penetapan'    => 'Penetapan',
        'pelaksanaan'  => 'Pelaksanaan',
        'evaluasi'     => 'Evaluasi',
        'pengendalian' => 'Pengendalian',
        'peningkatan'  => 'Peningkatan',
    ];

    const PLACEHOLDER_FILE_ID = 'GANTI_DENGAN_FILE_ID_GOOGLE_DRIVE';

    public function hasDriveFile(): bool
    {
        return filled($this->google_drive_file_id)
            && $this->google_drive_file_id !== self::PLACEHOLDER_FILE_ID;
    }

    protected $fillable = [
        'criteria_id', 'ppepp_category', 'document_number', 'title',
        'description', 'document_type', 'year',
        'google_drive_file_id', 'google_drive_mime_type', 'file_size_bytes',
        'sort_order', 'is_published', 'is_restricted', 
    ];

    protected $casts = [
        'is_published'   => 'boolean',
        'is_restricted'  => 'boolean',
        'file_size_bytes'=> 'integer',
        'year'           => 'integer',
    ];

    // === RELASI ===

    public function criteria(): BelongsTo
    {
        return $this->belongsTo(Criteria::class);
    }

    public function uploader(): BelongsTo
    {
        return $this->belongsTo(User::class, 'uploaded_by');
    }

    // === GOOGLE DRIVE URL ACCESSORS ===

    /**
     * URL untuk PREVIEW (buka langsung di browser tanpa download)
     * Gunakan ini untuk tombol "Lihat"
     */
    public function getPreviewUrlAttribute(): ?string
    {
        if (!$this->hasDriveFile()) return null;
        return "https://drive.google.com/file/d/{$this->google_drive_file_id}/preview";
    }

    /**
     * URL untuk DOWNLOAD langsung
     * Gunakan ini untuk tombol "Unduh"
     */
    public function getDownloadUrlAttribute(): ?string
    {
        if (!$this->hasDriveFile()) return null;
        return "https://drive.google.com/uc?export=download&id={$this->google_drive_file_id}";
    }

    /**
     * URL untuk VIEW (halaman Google Drive standar)
     */
    public function getViewUrlAttribute(): ?string
    {
        if (!$this->hasDriveFile()) return null;
        return "https://drive.google.com/file/d/{$this->google_drive_file_id}/view";
    }

    /**
     * File size dalam format manusia: "2.4 MB"
     */
    public function getFileSizeHumanAttribute(): string
    {
        if (!$this->file_size_bytes) return 'N/A';
        $units = ['B', 'KB', 'MB', 'GB'];
        $size  = $this->file_size_bytes;
        $i     = 0;
        while ($size >= 1024 && $i < count($units) - 1) {
            $size /= 1024;
            $i++;
        }
        return round($size, 1) . ' ' . $units[$i];
    }

    // === SCOPES ===

    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }

    public function scopeForCategory($query, string $category)
    {
        return $query->where('ppepp_category', $category);
    }
}