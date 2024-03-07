<?php

namespace Database\Seeders;

use App\Models\Division;
use App\Models\Manager;
use Illuminate\Database\Seeder;

class ManagerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /* see plan/sippa/users */
        $data = [];

        $j = 1;
        for ($i = 42; $i <= 49; $i++) {
            $data[] = [
                'user_id' => $i,
                'division_id' => $j,
            ];

            $data[] = [
                'user_id' => ++$i,
                'division_id' => $j,
            ];

            $j++;
        }

        for ($i = 12; $i <= 21; $i++) {
            $data[] = [
                'user_id' => $i,
                'division_id' => get_ids(Division::class),
            ];
        }

        foreach ($data as $record) {
            Manager::create($record);
        }
    }
}
