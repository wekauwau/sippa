<?php

namespace Database\Seeders;

use App\Models\RoomGroup;
use Illuminate\Database\Seeder;

class RoomGroupSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'name' => 'Al-Munjiyyat',
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
                'name' => 'El-Hawa',
                'gender' => 0,
            ],
            [
                'name' => 'Ad-Durroh',
                'gender' => 0,
            ],
        ];

        foreach ($data as $record) {
            RoomGroup::create($record);
        }
    }
}
