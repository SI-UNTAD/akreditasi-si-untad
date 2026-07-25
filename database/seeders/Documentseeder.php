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
        return [

            // =================================================================
            // KRITERIA 1: Visi, Misi, Tujuan dan Sasaran
            // =================================================================
            1 => [
                'penetapan' => [
                    [
                        'number' => '035/PY-KG/S.Kep/VII/2019',
                        'title' => 'SK Yayasan tentang Statuta',
                        'type' => 'SK',
                        'year' => 2019,
                        'file_id' => '11TADhHQzrRFiO2K9BfBV7oZOMf_Q5gD7?hl=ID',
                    ],
                    [
                        'number' => '012/UN28/KL/2023',
                        'title' => 'SK Rektor tentang Visi Misi Program Studi',
                        'type' => 'SK',
                        'year' => 2023,
                        'file_id' => 'GANTI_DENGAN_FILE_ID_GOOGLE_DRIVE',
                    ],
                    [
                        'number' => 'DOK-VMTS-001/2023',
                        'title' => 'Dokumen Visi, Misi, Tujuan dan Sasaran Prodi',
                        'type' => 'Dokumen',
                        'year' => 2023,
                        'file_id' => 'GANTI_DENGAN_FILE_ID_GOOGLE_DRIVE',
                    ],
                ],
                'pelaksanaan' => [
                    [
                        'number' => 'SOP-VMTS-001/2023',
                        'title' => 'SOP Sosialisasi Visi Misi kepada Civitas Akademika',
                        'type' => 'SOP',
                        'year' => 2023,
                        'file_id' => 'GANTI_DENGAN_FILE_ID_GOOGLE_DRIVE',
                    ],
                    [
                        'number' => 'LAP-SOS-001/2023',
                        'title' => 'Laporan Kegiatan Sosialisasi Visi Misi',
                        'type' => 'Laporan',
                        'year' => 2023,
                        'file_id' => 'GANTI_DENGAN_FILE_ID_GOOGLE_DRIVE',
                    ],
                ],
                'evaluasi' => [
                    [
                        'number' => 'EVAL-VMTS-001/2023',
                        'title' => 'Instrumen Evaluasi Ketercapaian Visi Misi',
                        'type' => 'Instrumen',
                        'year' => 2023,
                        'file_id' => 'GANTI_DENGAN_FILE_ID_GOOGLE_DRIVE',
                    ],
                    [
                        'number' => 'LAP-EVAL-VMTS/2023',
                        'title' => 'Laporan Hasil Evaluasi Visi Misi Tahun 2023',
                        'type' => 'Laporan',
                        'year' => 2023,
                        'file_id' => 'GANTI_DENGAN_FILE_ID_GOOGLE_DRIVE',
                    ],
                ],
                'pengendalian' => [
                    [
                        'number' => 'RTL-VMTS-001/2023',
                        'title' => 'Rencana Tindak Lanjut Hasil Evaluasi Visi Misi',
                        'type' => 'RTL',
                        'year' => 2023,
                        'file_id' => 'GANTI_DENGAN_FILE_ID_GOOGLE_DRIVE',
                    ],
                ],
                'peningkatan' => [
                    [
                        'number' => 'RENSTRA-001/2020',
                        'title' => 'Rencana Strategis Program Studi 2020-2025',
                        'type' => 'Renstra',
                        'year' => 2020,
                        'file_id' => 'GANTI_DENGAN_FILE_ID_GOOGLE_DRIVE',
                    ],
                ],
            ],

            // =================================================================
            // KRITERIA 2: Tata Pamong, Tata Kelola dan Kerjasama
            // =================================================================
            2 => [
                'penetapan' => [
                    [
                        'number' => 'SK-ORG-001/2022',
                        'title' => 'SK Penetapan Struktur Organisasi Program Studi',
                        'type' => 'SK',
                        'year' => 2022,
                        'file_id' => 'GANTI_DENGAN_FILE_ID_GOOGLE_DRIVE',
                    ],
                    [
                        'number' => 'SK-KPS-001/2023',
                        'title' => 'SK Pengangkatan Ketua Program Studi',
                        'type' => 'SK',
                        'year' => 2023,
                        'file_id' => 'GANTI_DENGAN_FILE_ID_GOOGLE_DRIVE',
                    ],
                ],
                'pelaksanaan' => [
                    [
                        'number' => 'SOP-RAPAT-001/2023',
                        'title' => 'SOP Pelaksanaan Rapat Program Studi',
                        'type' => 'SOP',
                        'year' => 2023,
                        'file_id' => 'GANTI_DENGAN_FILE_ID_GOOGLE_DRIVE',
                    ],
                    [
                        'number' => 'MOU-001/2023',
                        'title' => 'MoU Kerjasama dengan Industri (PT Telkom Indonesia)',
                        'type' => 'MoU',
                        'year' => 2023,
                        'file_id' => 'GANTI_DENGAN_FILE_ID_GOOGLE_DRIVE',
                    ],
                    [
                        'number' => 'MOU-002/2023',
                        'title' => 'MoU Kerjasama dengan Pemkot Palu',
                        'type' => 'MoU',
                        'year' => 2023,
                        'file_id' => 'GANTI_DENGAN_FILE_ID_GOOGLE_DRIVE',
                    ],
                ],
                'evaluasi' => [
                    [
                        'number' => 'EVAL-TATA-001/2023',
                        'title' => 'Laporan Evaluasi Tata Kelola Program Studi',
                        'type' => 'Laporan',
                        'year' => 2023,
                        'file_id' => 'GANTI_DENGAN_FILE_ID_GOOGLE_DRIVE',
                    ],
                ],
                'pengendalian' => [
                    [
                        'number' => 'SPI-001/2023',
                        'title' => 'Laporan Audit Mutu Internal Program Studi',
                        'type' => 'Laporan AMI',
                        'year' => 2023,
                        'file_id' => 'GANTI_DENGAN_FILE_ID_GOOGLE_DRIVE',
                    ],
                ],
                'peningkatan' => [
                    [
                        'number' => 'RTL-TATA-001/2023',
                        'title' => 'Rencana Tindak Lanjut Audit Mutu Internal',
                        'type' => 'RTL',
                        'year' => 2023,
                        'file_id' => 'GANTI_DENGAN_FILE_ID_GOOGLE_DRIVE',
                    ],
                ],
            ],

            // =================================================================
            // KRITERIA 3: Mahasiswa
            // =================================================================
            3 => [
                'penetapan' => [
                    [
                        'number' => 'SK-PENMABA-001/2023',
                        'title' => 'SK Penetapan Sistem Penerimaan Mahasiswa Baru',
                        'type' => 'SK',
                        'year' => 2023,
                        'file_id' => 'GANTI_DENGAN_FILE_ID_GOOGLE_DRIVE',
                    ],
                    [
                        'number' => 'PEDOMAN-MHS-001/2022',
                        'title' => 'Pedoman Akademik Mahasiswa Program Studi SI',
                        'type' => 'Pedoman',
                        'year' => 2022,
                        'file_id' => 'GANTI_DENGAN_FILE_ID_GOOGLE_DRIVE',
                    ],
                ],
                'pelaksanaan' => [
                    [
                        'number' => 'LAP-MABA-001/2023',
                        'title' => 'Laporan Penerimaan Mahasiswa Baru TA 2023/2024',
                        'type' => 'Laporan',
                        'year' => 2023,
                        'file_id' => 'GANTI_DENGAN_FILE_ID_GOOGLE_DRIVE',
                    ],
                    [
                        'number' => 'DATA-MHS-001/2023',
                        'title' => 'Data Mahasiswa Aktif Tahun Akademik 2023/2024',
                        'type' => 'Data',
                        'year' => 2023,
                        'file_id' => 'GANTI_DENGAN_FILE_ID_GOOGLE_DRIVE',
                    ],
                ],
                'evaluasi' => [
                    [
                        'number' => 'EVAL-MHS-001/2023',
                        'title' => 'Laporan Evaluasi Perkembangan Mahasiswa',
                        'type' => 'Laporan',
                        'year' => 2023,
                        'file_id' => 'GANTI_DENGAN_FILE_ID_GOOGLE_DRIVE',
                    ],
                ],
                'pengendalian' => [
                    [
                        'number' => 'SOP-DO-001/2022',
                        'title' => 'SOP Penanganan Mahasiswa Bermasalah Akademik',
                        'type' => 'SOP',
                        'year' => 2022,
                        'file_id' => 'GANTI_DENGAN_FILE_ID_GOOGLE_DRIVE',
                    ],
                ],
                'peningkatan' => [
                    [
                        'number' => 'PROG-PRESTASI-001/2023',
                        'title' => 'Program Peningkatan Prestasi Mahasiswa 2023',
                        'type' => 'Program Kerja',
                        'year' => 2023,
                        'file_id' => 'GANTI_DENGAN_FILE_ID_GOOGLE_DRIVE',
                    ],
                ],
            ],

            // =================================================================
            // KRITERIA 4: Sumber Daya Manusia
            // =================================================================
            4 => [
                'penetapan' => [
                    [
                        'number' => 'SK-DOSEN-001/2023',
                        'title' => 'SK Penetapan Dosen Tetap Program Studi',
                        'type' => 'SK',
                        'year' => 2023,
                        'file_id' => 'GANTI_DENGAN_FILE_ID_GOOGLE_DRIVE',
                    ],
                    [
                        'number' => 'RENSTRA-SDM-001/2021',
                        'title' => 'Rencana Pengembangan SDM Program Studi',
                        'type' => 'Renstra',
                        'year' => 2021,
                        'file_id' => 'GANTI_DENGAN_FILE_ID_GOOGLE_DRIVE',
                    ],
                ],
                'pelaksanaan' => [
                    [
                        'number' => 'DATA-DOSEN-001/2023',
                        'title' => 'Data Kualifikasi dan Kompetensi Dosen 2023',
                        'type' => 'Data',
                        'year' => 2023,
                        'file_id' => 'GANTI_DENGAN_FILE_ID_GOOGLE_DRIVE',
                    ],
                    [
                        'number' => 'LAP-PELATIHAN-001/2023',
                        'title' => 'Laporan Keikutsertaan Dosen dalam Pelatihan',
                        'type' => 'Laporan',
                        'year' => 2023,
                        'file_id' => 'GANTI_DENGAN_FILE_ID_GOOGLE_DRIVE',
                    ],
                ],
                'evaluasi' => [
                    [
                        'number' => 'EVAL-KINERJA-001/2023',
                        'title' => 'Laporan Evaluasi Kinerja Dosen Tahun 2023',
                        'type' => 'Laporan',
                        'year' => 2023,
                        'file_id' => 'GANTI_DENGAN_FILE_ID_GOOGLE_DRIVE',
                    ],
                ],
                'pengendalian' => [
                    [
                        'number' => 'RTL-SDM-001/2023',
                        'title' => 'Tindak Lanjut Evaluasi Kinerja Dosen',
                        'type' => 'RTL',
                        'year' => 2023,
                        'file_id' => 'GANTI_DENGAN_FILE_ID_GOOGLE_DRIVE',
                    ],
                ],
                'peningkatan' => [
                    [
                        'number' => 'PROG-STUDI-LANJUT/2023',
                        'title' => 'Program Dukungan Studi Lanjut Dosen',
                        'type' => 'Program',
                        'year' => 2023,
                        'file_id' => 'GANTI_DENGAN_FILE_ID_GOOGLE_DRIVE',
                    ],
                ],
            ],

            // =================================================================
            // KRITERIA 5: Keuangan, Sarana dan Prasarana
            // =================================================================
            5 => [
                'penetapan' => [
                    [
                        'number' => 'RKAT-001/2023',
                        'title' => 'Rencana Kerja dan Anggaran Tahunan (RKAT) 2023',
                        'type' => 'RKAT',
                        'year' => 2023,
                        'file_id' => 'GANTI_DENGAN_FILE_ID_GOOGLE_DRIVE',
                    ],
                    [
                        'number' => 'SK-SARPRAS-001/2022',
                        'title' => 'SK Penetapan Penggunaan Sarana Prasarana',
                        'type' => 'SK',
                        'year' => 2022,
                        'file_id' => 'GANTI_DENGAN_FILE_ID_GOOGLE_DRIVE',
                    ],
                ],
                'pelaksanaan' => [
                    [
                        'number' => 'LAP-KEU-001/2023',
                        'title' => 'Laporan Realisasi Anggaran Tahun 2023',
                        'type' => 'Laporan Keuangan',
                        'year' => 2023,
                        'file_id' => 'GANTI_DENGAN_FILE_ID_GOOGLE_DRIVE',
                    ],
                    [
                        'number' => 'DATA-ASET-001/2023',
                        'title' => 'Daftar Inventaris Sarana dan Prasarana',
                        'type' => 'Data Aset',
                        'year' => 2023,
                        'file_id' => 'GANTI_DENGAN_FILE_ID_GOOGLE_DRIVE',
                    ],
                ],
                'evaluasi' => [
                    [
                        'number' => 'EVAL-SARPRAS-001/2023',
                        'title' => 'Laporan Evaluasi Kondisi Sarana Prasarana',
                        'type' => 'Laporan',
                        'year' => 2023,
                        'file_id' => 'GANTI_DENGAN_FILE_ID_GOOGLE_DRIVE',
                    ],
                ],
                'pengendalian' => [
                    [
                        'number' => 'SOP-PEMELIHARAAN/2022',
                        'title' => 'SOP Pemeliharaan Sarana dan Prasarana',
                        'type' => 'SOP',
                        'year' => 2022,
                        'file_id' => 'GANTI_DENGAN_FILE_ID_GOOGLE_DRIVE',
                    ],
                ],
                'peningkatan' => [
                    [
                        'number' => 'PROG-PENGADAAN-001/2024',
                        'title' => 'Rencana Pengadaan Peralatan Lab 2024',
                        'type' => 'Program',
                        'year' => 2024,
                        'file_id' => 'GANTI_DENGAN_FILE_ID_GOOGLE_DRIVE',
                    ],
                ],
            ],

            // =================================================================
            // KRITERIA 6: Pendidikan
            // =================================================================
            6 => [
                'penetapan' => [
                    [
                        'number' => 'SK-KURIKULUM-001/2022',
                        'title' => 'SK Penetapan Kurikulum Program Studi SI 2022',
                        'type' => 'SK',
                        'year' => 2022,
                        'file_id' => 'GANTI_DENGAN_FILE_ID_GOOGLE_DRIVE',
                    ],
                    [
                        'number' => 'DOK-KUR-001/2022',
                        'title' => 'Dokumen Kurikulum Program Studi SI 2022',
                        'type' => 'Dokumen Kurikulum',
                        'year' => 2022,
                        'file_id' => 'GANTI_DENGAN_FILE_ID_GOOGLE_DRIVE',
                    ],
                ],
                'pelaksanaan' => [
                    [
                        'number' => 'JADWAL-001/GANJIL-2023',
                        'title' => 'Jadwal Perkuliahan Semester Ganjil 2023/2024',
                        'type' => 'Jadwal',
                        'year' => 2023,
                        'file_id' => 'GANTI_DENGAN_FILE_ID_GOOGLE_DRIVE',
                    ],
                    [
                        'number' => 'RPS-SI-001/2023',
                        'title' => 'Kumpulan RPS Mata Kuliah Semester Ganjil 2023',
                        'type' => 'RPS',
                        'year' => 2023,
                        'file_id' => 'GANTI_DENGAN_FILE_ID_GOOGLE_DRIVE',
                    ],
                    [
                        'number' => 'LAP-MONEV-PBM/2023',
                        'title' => 'Laporan Monitoring Perkuliahan Semester Ganjil',
                        'type' => 'Laporan',
                        'year' => 2023,
                        'file_id' => 'GANTI_DENGAN_FILE_ID_GOOGLE_DRIVE',
                    ],
                ],
                'evaluasi' => [
                    [
                        'number' => 'EVAL-PBM-001/2023',
                        'title' => 'Laporan Evaluasi Proses Belajar Mengajar',
                        'type' => 'Laporan',
                        'year' => 2023,
                        'file_id' => 'GANTI_DENGAN_FILE_ID_GOOGLE_DRIVE',
                    ],
                    [
                        'number' => 'HASIL-SURVEY-MHS/2023',
                        'title' => 'Hasil Survei Kepuasan Mahasiswa terhadap PBM',
                        'type' => 'Laporan Survey',
                        'year' => 2023,
                        'file_id' => 'GANTI_DENGAN_FILE_ID_GOOGLE_DRIVE',
                    ],
                ],
                'pengendalian' => [
                    [
                        'number' => 'RTL-PBM-001/2023',
                        'title' => 'Rencana Tindak Lanjut Evaluasi PBM',
                        'type' => 'RTL',
                        'year' => 2023,
                        'file_id' => 'GANTI_DENGAN_FILE_ID_GOOGLE_DRIVE',
                    ],
                ],
                'peningkatan' => [
                    [
                        'number' => 'PROG-KURIKULUM-2024',
                        'title' => 'Program Peninjauan Kurikulum Tahun 2024',
                        'type' => 'Program Kerja',
                        'year' => 2024,
                        'file_id' => 'GANTI_DENGAN_FILE_ID_GOOGLE_DRIVE',
                    ],
                ],
            ],

        ]; // ← tutup array documents()
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

            if (!$criteria) {
                $this->command->warn("  ⚠ Kriteria {$criteriaNumber} tidak ditemukan. Jalankan CriteriaSeeder terlebih dahulu.");
                continue;
            }

            $this->command->info("  → Kriteria {$criteriaNumber}: {$criteria->name}");

            foreach ($categories as $category => $docs) {
                foreach ($docs as $order => $doc) {
                    // Skip dokumen dengan file_id placeholder
                    if ($doc['file_id'] === 'GANTI_DENGAN_FILE_ID_GOOGLE_DRIVE') {
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
                            ]
                        );
                        $inserted++;
                    }
                }
            }
        }

        $this->command->info("✓ Selesai! {$inserted} dokumen dengan file ID, {$skipped} dokumen placeholder (belum ada file ID).");
        $this->command->line('');
        $this->command->line('Untuk mengisi file ID, edit method documents() di DocumentSeeder.php');
        $this->command->line('lalu jalankan: php artisan db:seed --class=DocumentSeeder');
    }
}