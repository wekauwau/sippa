<?php

namespace Database\Seeders;

use App\Models\Image;
use Illuminate\Database\Seeder;

class ImageSeeder extends Seeder
{
    public function run(): void
    {
        $records = [
            [
                'poster-alba-berselawat.jpg',
                null,
            ],
            [
                'alba-berselawat.jpg',
                null,
            ],
            [
                'isra-miraj.jpg',
                null,
            ],
            [
                'ziarah.jpg',
                null,
            ],
            [
                'nuzulul-quran.jpg',
                null,
            ],
            [
                'lailatul-qadar.jpg',
                null,
            ],
            [
                'syawalan.jpg',
                null,
            ],
            [
                'post-qurban.jpg',
                null,
            ],
        ];

        foreach ($records as $record) {
            Image::create([
                'name' => $record[0],
                'alt' => $record[1],
            ]);
        }
    }
}
