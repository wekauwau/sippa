<?php

namespace Database\Seeders;

use App\Models\EventName;
use Illuminate\Database\Seeder;

class EventNameSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['name' => 'Pesantren'],
            ['name' => 'Idul Adha 2022M/1443H'],
        ];

        foreach ($data as $val) {
            EventName::create($val);
        }
    }
}
