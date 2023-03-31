<?php

namespace Database\Seeders;

use App\Models\Division;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DivisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'Ketua',
                'events_id' => 1,
            ],
            [
                'name' => 'Sekretaris',
                'events_id' => 1,
            ],
            [
                'name' => 'Bendahara',
                'events_id' => 1,
            ],
            [
                'name' => 'Madin',
                'events_id' => 1,
            ],
            [
                'name' => 'Pendidikan',
                'events_id' => 1,
            ],
            [
                'name' => 'Keamanan',
                'events_id' => 1,
            ],
            [
                'name' => 'Kebersihan',
                'events_id' => 1,
            ],
            [
                'name' => 'Kerumahtanggaan',
                'events_id' => 1,
            ],
            [
                'name' => 'Humas',
                'events_id' => 1,
            ],
            [
                'name' => 'PMBS',
                'events_id' => 1,
            ],
            [
                'name' => 'Kesehatan',
                'events_id' => 1,
            ],
            [
                'name' => 'Ketua',
                'events_id' => 2,
            ],
            [
                'name' => 'Sekretaris Bendahara',
                'events_id' => 2,
            ],
            [
                'name' => 'Humas',
                'events_id' => 2,
            ],
            [
                'name' => 'Kerumahtanggaan',
                'events_id' => 2,
            ],
        ];

        foreach ($data as $val) {
            Division::create($val);
        }
    }
}
