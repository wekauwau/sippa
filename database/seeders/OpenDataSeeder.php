<?php

namespace Database\Seeders;

use App\Models\OpenData;
use Illuminate\Database\Seeder;

class OpenDataSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['data_id' => 3],
        ];

        foreach ($data as $val) {
            OpenData::create($val);
        }
    }
}
