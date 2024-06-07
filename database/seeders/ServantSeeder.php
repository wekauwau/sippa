<?php

namespace Database\Seeders;

use App\Models\Servant;
use Illuminate\Database\Seeder;

class ServantSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [7, 1],
            [8, 2],
            [9, 3],
            [10, 4],
            [35, 5],
            [36, 6],
            [37, 7],
        ];

        foreach ($data as $item) {
            Servant::create([
                'student_id' => $item[0],
                'service_id' => $item[1],
            ]);
        }
    }
}
