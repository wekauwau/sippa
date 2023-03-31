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
                'phone' => '',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'role_pesantrens_id' => 2,
            ],
            [
                'name' => 'Mohammad Nizar',
                'phone' => '',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'role_pesantrens_id' => 1,
            ],
            [
                'name' => 'Isna Rahmi N.',
                'phone' => '',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'role_pesantrens_id' => 1,
            ],
            [
                'name' => 'Handika Yoga Pratama',
                'phone' => '',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'role_pesantrens_id' => 3,
            ],
            [
                'name' => 'Muhammad Taufiqurrahman',
                'phone' => '',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'role_pesantrens_id' => 3,
            ],
            [
                'name' => 'Nur Muhammad Ikhsanun',
                'phone' => '',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'role_pesantrens_id' => 3,
            ],
            [
                'name' => 'Zulfa Farikhatun Nisak',
                'phone' => '',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'role_pesantrens_id' => 3,
            ],
            [
                'name' => 'Hanifian',
                'phone' => '',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'role_pesantrens_id' => 3,
            ],
            [
                'name' => 'Wahyu Eka Saputra',
                'phone' => '',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'role_pesantrens_id' => 3,
            ],
            [
                'name' => 'Husnul Muadiba',
                'phone' => '',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'role_pesantrens_id' => 4,
            ],
        ];

        foreach ($data as $val) {
            User::create($val);
        }
    }
}
