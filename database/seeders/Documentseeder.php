<?php

namespace Database\Seeders;

use App\Models\Criteria;
use App\Models\Document;
use Illuminate\Database\Seeder;


class DocumentSeeder extends Seeder
{
    // =========================================================================
    // PANDUAN PENGISIAN FILE ID GOOGLE DRIVE
    // =========================================================================
    // 1. Buka file di Google Drive
    // 2. Lihat URL: https://drive.google.com/file/d/XXXXXXXXXXXXXXXXXXXX/view
    //                                                ^^^^^^^^^^^^^^^^^^^^
    //                                                Salin bagian INI saja
    // 3. Tempel sebagai nilai 'file_id' di bawah
    // 4. Pastikan sharing file diset: "Anyone with the link" → Viewer
    // =========================================================================

    // -------------------------------------------------------------------------
    // KONFIGURASI DATA DOKUMEN — EDIT BAGIAN INI
    // Ganti nilai 'file_id' => 'GANTI_DENGAN_FILE_ID_GOOGLE_DRIVE'
    // dengan File ID asli dari Google Drive Anda
    // -------------------------------------------------------------------------
    private function documents(): array
    {
        $docs = [
            1 => [
                'penetapan' => [
                    [
                        'number' => '...',
                        'title' => '...',
                        'description' => 'Surat Keputusan Yayasan...',
                        'document_number' => '...',
                        'type' => '...',
                        'year' => 2024,
                        'file_id' => \App\Models\Document::PLACEHOLDER_FILE_ID,
                        'google_drive_mime_type' => 'application/pdf',
                        'file_size_bytes' => 1024,
                        'sort_order' => 1,
                        'is_published' => true,
                        'is_restricted' => false,
                        'uploaded_by' => 1,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ],
                ],
            ],
        ];
        return $docs;
    }

    // -------------------------------------------------------------------------
    // JANGAN UBAH KODE DI BAWAH INI
    // -------------------------------------------------------------------------
    public function run(): void
    {
        $this->command->info('Memulai seeding dokumen...');
        $inserted = 0;
        $skipped = 0;

        foreach ($this->documents() as $criteriaNumber => $categories) {
            $criteria = Criteria::where('number', $criteriaNumber)->first();

            $this->command->info("  → Kriteria {$criteriaNumber}: {$criteria->name}");

            foreach ($categories as $category => $docs) {
                foreach ($docs as $order => $doc) {
                    // Skip dokumen dengan file_id placeholder
                    if ($doc['file_id'] === \App\Models\Document::PLACEHOLDER_FILE_ID) {
                        Document::updateOrCreate(
                            [
                                'criteria_id' => $criteria->id,
                                'ppepp_category' => $category,
                                'title' => $doc['title'],
                            ],
                            [
                                'document_number' => $doc['number'],
                                'document_type' => $doc['type'],
                                'year' => $doc['year'],
                                'google_drive_file_id' => null, // null = placeholder
                                'sort_order' => $order,
                                'is_published' => true,
                                'description' => $doc['description'],
                            ]
                        );
                        $skipped++;
                    } else {
                        Document::updateOrCreate(
                            [
                                'criteria_id' => $criteria->id,
                                'ppepp_category' => $category,
                                'title' => $doc['title'],
                            ],
                            [
                                'document_number' => $doc['number'],
                                'document_type' => $doc['type'],
                                'year' => $doc['year'],
                                'google_drive_file_id' => $doc['file_id'],
                                'sort_order' => $order,
                                'is_published' => true,
                                'description' => $doc['description'],
                            ]
                        );
                        $inserted++;
                    }
                }
            }
        }
    }
}