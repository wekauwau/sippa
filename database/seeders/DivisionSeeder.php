<?php

namespace Database\Seeders;

use App\Models\Division;
use Illuminate\Database\Seeder;

class DivisionSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            'Ketua',
            'Sekretaris',
            'Bendahara',
            'Kerumahtanggaan',
            'Pendidikan',
            'Kebersihan',
            'Kesehatan',
            'Keamanan',
            'Humas',
            'PMBS',
        ];

        foreach ($data as $record) {
            Division::create([
                'name' => $record,
            ]);
        }
    }
}
