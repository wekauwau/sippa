<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['name' => 'Pengasuh'],
            ['name' => 'Lurah'],
            ['name' => 'Pengurus'],
            ['name' => 'Ketua'],
            ['name' => 'Panitia'],
            // TODO: masukkan laporan
            ['name' => 'Santri'],
        ];

        foreach ($data as $val) {
            Role::create($val);
        }
    }
}
