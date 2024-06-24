<?php

namespace Database\Seeders;

use App\Models\Head;
use Illuminate\Database\Seeder;

class HeadSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [1, 1],
            [2, 0],
            [3, 0],
        ];

        foreach ($data as $item) {
            Head::create([
                'user_id' => $item[0],
                'principal' => $item[1],
            ]);
        }
    }
}
