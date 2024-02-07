<?php

namespace Database\Seeders;

use App\Models\MadinRoom;
use Illuminate\Database\Seeder;

class MadinRoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['name' => 'Aula Al-Fatih'],
            ['name' => 'Ad-Durroh bawah'],
            ['name' => 'Al-A\'la'],
            ['name' => 'Aula El-Hawa'],
            ['name' => 'Aula Al-Barokah'],
            ['name' => 'Al-Munjiyyat'],
            ['name' => 'Masjid Al-Fajar'],
        ];

        foreach ($data as $record) {
            MadinRoom::create($record);
        }
    }
}
