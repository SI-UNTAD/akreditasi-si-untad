<?php
// app/Http/Controllers/HomeController.php

namespace App\Http\Controllers;

use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $achievements = [
            [
                'category' => 'International Competition',
                'title' => 'Gold Medal I-Jamcsiix 2025',
                'desc' => 'Integrating SMART and GIS for Road Repair Prioritization',
                'img' => asset('images/pencapaian2.webp'),
                'alt' => 'Gold Medal I-Jamcsiix',
                'color' => 'accent-purple',
            ],
            [
                'category' => 'Nasional Competition',
                'title' => 'Pendanaan PKM GFT 2025',
                'desc' => 'Museum Digital Twin: Pelestarian Budaya Indonesia Berbasis Metaverse.',
                'img' => asset('images/pencapaian3.webp'),
                'alt' => 'Museum Digital Twin: Pelestarian Budaya Indonesia Berbasis Metaverse',
                'color' => 'accent-orange',
            ],
            [
                'category' => 'Regional Achievement',
                'title' => 'East Indonesia Robot Contest 2025',
                'desc' => 'Juara 1 Kategori Lomba - Robot Sumo.',
                'img' => asset('images/pencapaian1.webp'),
                'alt' => 'East Indonesia Robot Contest 2025',
                'color' => 'accent-teal',
            ],
        ];

        $orgStructure = [
            'head' => [
                'name' => 'Yusuf Anshori, S.T., M.T.',
                'title' => 'Kepala Program Studi',
                'icon' => 'person',
            ],
            'lecturers' => [
                ['name' => 'Wirdayanti', 'title' => 'S.T., M.Eng.'],
                ['name' => 'Rizka Ardiansyah', 'title' => 'S.Kom., M.Kom.'],
                ['name' => 'Ir. Hajra Rasmita Ngemba', 'title' => 'S.Kom., M.M., M.Kom'],
                ['name' => 'Dwi Shinta Angreni', 'title' => 'S.Si., M.Kom.'],
                ['name' => 'Ir. Syahrullah', 'title' => 'M.Kom.'],
                ['name' => 'Anisa Yulandari', 'title' => 'M.Kom.'],
                ['name' => 'Ayu Hernita', 'title' => 'M.Kom.'],
                ['name' => 'Fizar Syafa\'at', 'title' => 'S.Kom., M.Kom.'],
                ['name' => 'Rinianty', 'title' => 'S.Kom., M.TI.'],
            ],
        ];

        return view('home', compact('achievements', 'orgStructure'));
    }
}