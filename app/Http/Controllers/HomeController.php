<?php
// app/Http/Controllers/HomeController.php

namespace App\Http\Controllers;

use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        // Data statis untuk saat ini — bisa dipindah ke DB nanti
        $achievements = [
            [
                'category' => 'International Competition',
                'title'    => 'Gold Medal I-Jamcsiix 2025',
                'desc'     => 'Integrating SMART and GIS for Road Repair Prioritization',
                'img'      => asset('images/🏆 [SELAMAT & SUKSES!] 🏆Keluarga besar Himpunan Mahasiswa Teknik Informatika (HMTI) Universita.webp'),
                'alt'      => 'Gold Medal I-Jamcsiix',
            ],
            [
                'category' => 'Nasional Competition',
                'title'    => 'Pendanaan PKM GFT 2025',
                'desc'     => 'Museum Digital Twin: Pelestarian Budaya Indonesia Berbasis Metaverse.',
                'img'      => asset('images/🚀 PRESTASI GEMILANG! 🚀Selamat dan sukses kami ucapkan kepada Tim HMTI UNTAD dan perwakilan an.webp'),
                'alt'      => 'Museum Digital Twin: Pelestarian Budaya Indonesia Berbasis Metaverse',
            ],
            [
                'category' => 'Regional Achievement',
                'title'    => 'East Indonesia Robot Contest 2025',
                'desc'     => 'Juara 1 Kategori Lomba - Robot Sumo.',
                'img'      => asset('images/🎉 CONGRATULATION! 🎉Dengan bangga kami mengucapkan selamat kepada Anggota HMTI UNTAD atas prest.jpg'),
                'alt'      => 'East Indonesia Robot Contest 2025',
            ],
        ];

        $orgStructure = [
            'head' => [
                'name'  => 'Yusuf Anshori, S.T., M.T.',
                'title' => 'Kepala Program Studi',
                'icon'  => 'person',
            ],
            'units' => [
                ['name' => 'Sekretaris Prodi',       'desc' => 'Adm & Keuangan'],
                ['name' => 'Koordinator Lab',         'desc' => 'Fasilitas Riset'],
                ['name' => 'Unit Penjaminan Mutu',    'desc' => 'Akreditasi & Standar'],
            ],
        ];

        return view('home', compact('achievements', 'orgStructure'));
    }
}