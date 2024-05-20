<?php

namespace Database\Seeders;

use App\Models\Madin;
use Illuminate\Database\Seeder;

class MadinSeeder extends Seeder
{
    public function run(): void
    {
        // first teacher
        $i = 1;

        $data = [
            /* grade.id = 1 */
            [
                1, 'Ahad', 1, 1, 1, $i,
            ],
            [
                1, 'Senin', 1, 1, 2, $i + 1,
            ],
            [
                1, 'Selasa', 1, 1, 3, $i + 2,
            ],
            [
                1, 'Rabu', 1, 1, 4, $i + 3,
            ],
            [
                1, 'Jumat', 1, 1, 5, $i + 4,
            ],
            [
                1, 'Sabtu', 1, 1, 6, $i + 3,
            ],
            /* grade.id = 2 */
            [
                1, 'Ahad', 2, 2, 7, $i + 5,
            ],
            [
                1, 'Senin', 2, 2, 8, $i + 6,
            ],
            [
                1, 'Selasa', 2, 2, 4, $i + 7,
            ],
            [
                1, 'Rabu', 2, 2, 3, $i + 8,
            ],
            [
                1, 'Jumat', 2, 2, 5, $i + 9,
            ],
            [
                1, 'Sabtu', 2, 2, 2, $i + 10,
            ],
            /* grade.id = 3 */
            [
                1, 'Ahad', 3, 3, 2, $i + 1,
            ],
            [
                1, 'Senin', 3, 3, 9, $i + 11,
            ],
            [
                1, 'Selasa', 3, 3, 10, $i + 11,
            ],
            [
                1, 'Rabu', 3, 3, 12, $i + 4,
            ],
            [
                1, 'Jumat', 3, 3, 11, $i + 12,
            ],
            [
                1, 'Sabtu', 3, 3, 12, $i + 4,
            ],
            /* grade.id = 4 */
            [
                1, 'Ahad', 4, 4, 12, $i + 13,
            ],
            [
                1, 'Senin', 4, 4, 11, $i + 14,
            ],
            [
                1, 'Selasa', 4, 4, 2, $i + 15,
            ],
            [
                1, 'Rabu', 4, 4, 10, $i + 10,
            ],
            [
                1, 'Jumat', 4, 4, 12, $i + 13,
            ],
            [
                1, 'Sabtu', 4, 4, 9, $i + 16,
            ],
            /* grade.id = 5 */
            [
                1, 'Ahad', 5, 5, 13, $i + 17,
            ],
            [
                1, 'Senin', 5, 5, 14, $i + 18,
            ],
            [
                1, 'Selasa', 5, 5, 15, $i + 19,
            ],
            [
                1, 'Rabu', 5, 5, 16, $i + 20,
            ],
            [
                1, 'Jumat', 5, 5, 17, $i + 17,
            ],
            [
                1, 'Sabtu', 5, 5, 18, $i + 21,
            ],
            /* grade.id = 6 */
            [
                1, 'Ahad', 6, 6, 19, $i + 22,
            ],
            [
                1, 'Senin', 6, 6, 20, $i + 21,
            ],
            [
                1, 'Selasa', 6, 6, 21, $i + 23,
            ],
            [
                1, 'Rabu', 6, 6, 22, $i + 17,
            ],
            [
                1, 'Jumat', 6, 6, 23, $i + 24,
            ],
            [
                1, 'Sabtu', 6, 6, 24, $i + 25,
            ],
            /* grade.id = 7 */
            [
                1, 'Ahad', 7, 7, 25, $i + 26,
            ],
            [
                1, 'Selasa', 7, 7, 26, $i + 27,
            ],
            [
                1, 'Rabu', 7, 7, 27, $i + 28,
            ],
            [
                1, 'Jumat', 7, 7, 28, $i + 29,
            ],
        ];

        foreach ($data as $record) {
            Madin::create([
                'semester_id' => $record[0],
                'day' => $record[1],
                'grade_id' => $record[2],
                'madin_room_id' => $record[3],
                'lesson_id' => $record[4],
                'teacher_id' => $record[5],
            ]);
        }
    }
}
