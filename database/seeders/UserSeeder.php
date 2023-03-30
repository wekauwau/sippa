<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'name' => 'Anita Durotul Yatimah',
                'username' => '',
                'phone' => '',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            ],
            [
                'name' => 'Nizar',
                'username' => 'nizar',
                'phone' => '',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            ],
            // TODO: teruskan
        ];

        foreach ($data as $val) {
            User::create($val);
        }
    }
}
