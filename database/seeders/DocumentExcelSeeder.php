<?php

namespace Database\Seeders;

use App\Models\Criteria;
use App\Models\Document;
use Illuminate\Database\Seeder;

class DocumentExcelSeeder extends Seeder
{
    public function run(): void
    {
        $arrayPath = base_path('database/seeders/data/documents_array.php');

        if (! file_exists($arrayPath)) {
            $this->command->error("File array tidak ditemukan: {$arrayPath}");
            $this->command->line('Jalankan generate_array.cjs terlebih dahulu untuk generate file ini.');
            return;
        }

        $documents = require $arrayPath;

        $this->command->info('Memproses ' . count($documents) . ' dokumen dari array...');

        $inserted = 0;
        $updated = 0;
        $skipped = 0;
        $errors = 0;

        $this->command->getOutput()->progressStart(count($documents));

        foreach ($documents as $doc) {
            $this->command->getOutput()->progressAdvance();

            $fileId = $doc['fileId'];
            $criteriaNumber = $doc['criteriaNumber'];
            $ppeppCategory = $doc['ppeppCategory'];
            $namaFile = $doc['namaFile'];
            $text = $doc['text'];
            $year = $doc['year'];
            $no = $doc['no'];

            // Validasi required fields
            if (! $fileId || ! $criteriaNumber || ! $ppeppCategory || ! $namaFile) {
                $skipped++;
                continue;
            }

            $criteria = Criteria::where('number', (int)$criteriaNumber)->first();

            if (! $criteria) {
                $this->command->warn("Kriteria {$criteriaNumber} tidak ditemukan di DB, skip baris No. {$no}");
                $skipped++;
                continue;
            }

            try {
                $result = Document::updateOrCreate(
                    [
                        'google_drive_file_id' => trim($fileId),
                        'criteria_id' => $criteria->id,
                        'ppepp_category' => $ppeppCategory,
                    ],
                    [
                        'title' => $namaFile,
                        'description' => $text,
                        'year' => $year,
                        'document_type' => null,
                        'document_number' => null,
                        'sort_order' => is_numeric($no) ? (int)$no : 0,
                        'is_published' => true,
                        'is_restricted' => false,
                        'uploaded_by' => 1,
                    ]
                );

                if ($result->wasRecentlyCreated) {
                    $inserted++;
                } else {
                    $updated++;
                }
            } catch (\Throwable $e) {
                $this->command->error("Error baris No. {$no}: {$e->getMessage()}");
                $errors++;
            }
        }

        $this->command->getOutput()->progressFinish();
        $this->command->newLine();
        $this->command->info("✓ Selesai!");
        $this->command->line("  Baru: {$inserted}");
        $this->command->line("  Update: {$updated}");
        $this->command->line("  Skip: {$skipped}");
        $this->command->line("  Error: {$errors}");
    }
}