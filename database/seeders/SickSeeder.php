<?php

namespace Database\Seeders;

use App\Models\Sick;
use Illuminate\Database\Seeder;

class SickSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [42, date_create('2024-03-02'), date_create('2024-03-03'), 'Demam'],
            [42, date_create('2024-3-15'), date_create('2024-03-18'), 'Radang dan batuk/pilek'],
        ];

        foreach ($data as $record) {
            Sick::create([
                'student_user_id' => $record[0],
                'start' => $record[1],
                'end' => $record[2],
                'info' => $record[3],
            ]);
        }
    }
}
