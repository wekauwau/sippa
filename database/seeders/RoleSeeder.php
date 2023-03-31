<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['name' => 'Ketua'],
            ['name' => 'Koordinator'],
            ['name' => 'Anggota'],
        ];

        foreach ($data as $val) {
            Role::create($val);
        }
    }
}
