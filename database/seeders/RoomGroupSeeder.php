<?php

namespace Database\Seeders;

use App\Models\RoomGroup;
use Illuminate\Database\Seeder;

class RoomGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'Al-Munjiyat',
                'gender' => 1,
            ],
            [
                'name' => 'Al-Fatih',
                'gender' => 1,
            ],
            [
                'name' => 'Al-A\'la',
                'gender' => 1,
            ],
            [
                'name' => 'Green Khumaira',
                'gender' => 0,
            ],
            [
                'name' => 'Elhawa',
                'gender' => 0,
            ],
            [
                'name' => 'Ad-Duroh',
                'gender' => 0,
            ],
        ];

        foreach ($data as $record) {
            RoomGroup::create($record);
        }
    }
}
