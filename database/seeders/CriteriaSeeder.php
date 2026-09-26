<?php

namespace Database\Seeders;

use App\Models\Criteria;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CriteriaSeeder extends Seeder
{
    public function run(): void
    {
        $criteriaData = [
            [1, 'Budaya Mutu', 'flag'],
            [2, 'Relevansi Pendidikan', 'account_balance'],
            [3, 'Relevansi Penelitian', 'group'],
            [4, 'Relevansi Pengabdian kepada Masyarakat', 'person_search'],
            [5, 'Akuntabilitas', 'payments'],
            [6, 'Diferensiasi Misi', 'school'],
        ];

        foreach ($criteriaData as [$number, $name, $icon]) {
            Criteria::updateOrCreate(
                ['number' => $number],
                [
                    'name'      => $name,
                    'slug'      => 'kriteria-' . $number . '-' . Str::slug($name),
                    'icon'      => $icon,
                    'is_active' => true,
                ]
            );
        }
    }
}