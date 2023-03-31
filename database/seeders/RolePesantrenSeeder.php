<?php

namespace Database\Seeders;

use App\Models\RolePesantren;
use Illuminate\Database\Seeder;

class RolePesantrenSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['name' => 'Lurah'],
            ['name' => 'Pengasuh'],
            ['name' => 'Pengurus'],
            ['name' => 'Santri'],
        ];

        foreach ($data as $val) {
            RolePesantren::create($val);
        }
    }
}
