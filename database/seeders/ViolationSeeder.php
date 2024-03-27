<?php

namespace Database\Seeders;

use App\Models\Violation;
use Illuminate\Database\Seeder;

class ViolationSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [42, date_create('2024-01-11'), 'Meninggalkan mujahadah', null],
            [42, date_create('2024-02-01'), 'Meninggalkan madin', null],
        ];

        foreach ($data as $record) {
            Violation::create([
                'student_user_id' => $record[0],
                'date' => $record[1],
                'info' => $record[2],
                'punishment' => $record[3],
            ]);
        }
    }
}
