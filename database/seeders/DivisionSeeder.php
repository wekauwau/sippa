<?php

namespace Database\Seeders;

use App\Models\Division;
use Illuminate\Database\Seeder;

class DivisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['name' => 'Ketua'],
            ['name' => 'Sekretaris'],
            ['name' => 'Bendahara'],
            ['name' => 'Kerumahtanggaan'],
            ['name' => 'Pendidikan'],
            ['name' => 'Kebersihan'],
            ['name' => 'Kesehatan'],
            ['name' => 'Keamanan'],
            ['name' => 'Humas'],
            ['name' => 'PMBS'],
        ];

        foreach ($data as $record) {
            Division::create($record);
        }
    }
}
