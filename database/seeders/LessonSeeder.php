<?php

namespace Database\Seeders;

use App\Models\Lesson;
use Illuminate\Database\Seeder;

class LessonSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'name' => 'Safinatunnaja',
                'info' => null,
            ],
            [
                'name' => 'Shorof',
                'info' => null,
            ],
            [
                'name' => 'Jurumiyyah 1',
                'info' => null,
            ],
            [
                'name' => 'Syifa\'ul Jinan',
                'info' => null,
            ],
            [
                'name' => 'Aqidatul \'Awam',
                'info' => null,
            ],
            [
                'name' => 'Akhlaqu Lil Banin',
                'info' => null,
            ],
            [
                'name' => 'Akhlaqu Lil Banat',
                'info' => null,
            ],
            [
                'name' => 'Safinah',
                'info' => null,
            ],
            [
                'name' => 'Fathul Qorib 1',
                'info' => null,
            ],
            [
                'name' => 'Taysirul Kholaq',
                'info' => null,
            ],
            [
                'name' => 'Arba\'in Nawawi',
                'info' => null,
            ],
            [
                'name' => 'Jurumiyyah 2',
                'info' => null,
            ],
            [
                'name' => '\'Imrithi',
                'info' => null,
            ],
            [
                'name' => 'Hujjah Ahlussunnah',
                'info' => null,
            ],
            [
                'name' => 'Jawahirul Kalamiyah',
                'info' => null,
            ],
            [
                'name' => 'Fathul Qorib 2',
                'info' => null,
            ],
            [
                'name' => 'Qowaidul I\'lal',
                'info' => null,
            ],
            [
                'name' => 'Ta\'limul Muta\'allim',
                'info' => null,
            ],
            [
                'name' => 'Mabadi Awaliyah',
                'info' => null,
            ],
            [
                'name' => 'Qowaid Al Asasiyah',
                'info' => null,
            ],
            [
                'name' => 'Fathul Qorib 3',
                'info' => null,
            ],
            [
                'name' => 'Qiro\'ah',
                'info' => null,
            ],
            [
                'name' => 'Tafsir Al Ibriz',
                'info' => null,
            ],
            [
                'name' => 'At Tibyan',
                'info' => null,
            ],
            [
                'name' => 'Nashoihul \'Ibad',
                'info' => null,
            ],
            [
                'name' => '\'Idzotun Nasyi\'in',
                'info' => null,
            ],
            [
                'name' => 'Fiqih',
                'info' => null,
            ],
            [
                'name' => 'As Sulam',
                'info' => null,
            ],
        ];

        foreach ($data as $record) {
            Lesson::create($record);
        }
    }
}
