<?php

namespace Database\Seeders;

use App\Models\Manager;
use Illuminate\Database\Seeder;

class ManagerSeeder extends Seeder
{
    public function run(): void
    {
        $first_manager = 4;
        $divisions_total = 10;

        // 2 manager for each division
        for ($j = 1; $j <= $divisions_total; $j++) {

            for ($k = 0; $k < 2; $k++) {
                Manager::create([
                    'user_id' => $first_manager++,
                    'division_id' => $j,
                ]);
            }
        }
    }
}
