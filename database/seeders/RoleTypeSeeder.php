<?php

namespace Database\Seeders;

use App\Models\RoleType;
use Illuminate\Database\Seeder;

class RoleTypeSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['name' => 'Ketua'],
            ['name' => 'Koordinator'],
            ['name' => 'Anggota'],
        ];

        foreach ($data as $val) {
            RoleType::create($val);
        }
    }
}
