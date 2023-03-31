<?php

namespace Database\Seeders;

use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'event_names_id' => 1,
                'desc' => null,
                'date' => null,
            ],
            [
                'event_names_id' => 2,
                'desc' => '2022M/1443H',
                'date' => Carbon::parse('2022-07-10'),
            ],
        ];

        foreach ($data as $val) {
            Event::create($val);
        }
    }
}
