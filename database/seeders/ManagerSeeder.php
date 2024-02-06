<?php

namespace Database\Seeders;

use App\Models\Manager;
use Illuminate\Database\Seeder;

class ManagerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'user_id' => 6,
                'division_id' => 1,
            ],
            [
                'user_id' => 8,
                'division_id' => 2,
            ],
        ];

        foreach ($data as $record) {
            Manager::create($record);
        }
    }
}
