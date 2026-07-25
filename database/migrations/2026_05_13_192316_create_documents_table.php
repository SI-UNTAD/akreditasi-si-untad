<?php
// database/migrations/xxxx_create_documents_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->id();

            // === HIERARKI RELASI ===
            $table->foreignId('criteria_id')
                  ->constrained('criteria')
                  ->cascadeOnDelete()
                  ->comment('Relasi ke tabel criteria');

            // === KATEGORI PPEPP ===
            $table->enum('ppepp_category', [
                'penetapan',    // P — Penetapan
                'pelaksanaan',  // P — Pelaksanaan
                'evaluasi',     // E — Evaluasi
                'pengendalian', // P — Pengendalian
                'peningkatan',  // P — Peningkatan
                'summary',      // Summary (opsional, non-PPEPP)
            ])->comment('Kategori PPEPP dokumen');

            // === METADATA DOKUMEN ===
            $table->string('document_number')            // "035/PY-KG/S.kep/VII/2019"
                  ->nullable()
                  ->comment('Nomor resmi dokumen');
            $table->string('title')                      // "SK Yayasan tentang Statuta"
                  ->comment('Judul/nama dokumen');
            $table->text('description')->nullable()
                  ->comment('Deskripsi singkat isi dokumen');
            $table->string('document_type')              // "SK", "SOP", "Laporan", dst.
                  ->nullable()
                  ->comment('Jenis dokumen');
            $table->year('year')->nullable()             // 2024
                  ->comment('Tahun dokumen');

            // === GOOGLE DRIVE INTEGRATION ===
            // PENTING: Hanya simpan file_id, bukan URL lengkap
            // URL dapat direkonstruksi: https://drive.google.com/file/d/{file_id}/view
            $table->string('google_drive_file_id')
                  ->nullable()
                  ->comment('Google Drive File ID (bukan full URL)');
            $table->string('google_drive_mime_type')     // "application/pdf"
                  ->nullable()
                  ->comment('MIME type file di Google Drive');
            $table->unsignedBigInteger('file_size_bytes')// Ukuran dalam bytes
                  ->nullable()
                  ->comment('Ukuran file dalam bytes');

            // === ORDERING & STATUS ===
            $table->unsignedSmallInteger('sort_order')
                  ->default(0)
                  ->comment('Urutan tampil dalam kategori');
            $table->boolean('is_published')->default(true)
                  ->comment('Dokumen terlihat oleh publik?');
            $table->boolean('is_restricted')->default(false)
                  ->comment('Perlu login untuk akses?');

            // === AUDIT TRAIL ===
            $table->foreignId('uploaded_by')
                  ->nullable()
                  ->constrained('users')
                  ->nullOnDelete()
                  ->comment('User yang mengupload');
            $table->timestamps();
            $table->softDeletes(); // Untuk fitur "arsip" dokumen

            // === INDEXES ===
            // Composite index untuk query utama: filter by criteria + ppepp
            $table->index(['criteria_id', 'ppepp_category', 'is_published'], 'idx_criteria_ppepp_published');
            $table->index('google_drive_file_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('documents');
    }
};