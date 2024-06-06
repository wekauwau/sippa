<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            "Depot gas dan isi ulang galon Al-Barokah",
            "Kantin Al-Barokah",
            "KBIH Al-Barokah",
            "Laundry Al-Barokah",
            "MTs Al-Barokah Robotika",
            "TPA Pondok",
            "TPA Kricak",
        ];

        foreach ($data as $item) {
            Service::create(['name' => $item]);
        }
    }
}
