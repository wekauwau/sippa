<?php

namespace Database\Seeders;

use App\Models\MadinRoom;
use Illuminate\Database\Seeder;

class MadinRoomSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            'Aula Al-Fatih',
            'Ad-Durroh bawah',
            'Al-A\'la',
            'Aula El-Hawa',
            'Aula Al-Barokah',
            'Al-Munjiyyat',
            'Masjid Al-Fajar',
        ];

        foreach ($data as $record) {
            MadinRoom::create([
                'name' => $record
            ]);
        }
    }
}
