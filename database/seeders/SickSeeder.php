<?php

namespace Database\Seeders;

use App\Models\Sick;
use Illuminate\Database\Seeder;

class SickSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [20, date_create('2024-03-02'), date_create('2024-03-03'), 'Demam'],
            [20, date_create('2024-3-15'), date_create('2024-03-18'), 'Pusing'],
        ];

        foreach ($data as $record) {
            Sick::create([
                'student_user_id' => $record[0],
                'start' => $record[1],
                'end' => $record[2],
                'info' => $record[3],
            ]);
        }

        Sick::factory(18)->create();
    }
}
