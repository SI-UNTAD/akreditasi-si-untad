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
            [1, 'Visi, Misi, Tujuan dan Sasaran',         'flag'],
            [2, 'Tata Pamong, Tata Kelola dan Kerjasama', 'account_balance'],
            [3, 'Mahasiswa',                               'group'],
            [4, 'Sumber Daya Manusia',                    'person_search'],
            [5, 'Keuangan, Sarana dan Prasarana',         'payments'],
            [6, 'Pendidikan',                             'school'],
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