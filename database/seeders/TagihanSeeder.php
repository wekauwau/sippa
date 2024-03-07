<?php

namespace Database\Seeders;

use App\Models\Tagihan;
use Illuminate\Database\Seeder;

class TagihanSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'Ziarah',
                null,
                date_create('2024-02-29'),
                '310.000'
            ],
            [
                'Iuran Ramadhan',
                'Santri di pondok: Rp110.000\n
                Santri di rumah (uzur): Rp85.000',
                date_create('2024-03-06'),
                null,
            ],
            [
                'Pembayaran kitab Ramadhan',
                'Jumlah pembayaran sesuai kitab yang dipesan',
                date_create('2024-03-07'),
                null,
            ],
            [
                'Syahriah bulan Maret',
                null,
                date_create('2024-03-10'),
                '330.000',
            ],
        ];

        foreach ($data as $item) {
            Tagihan::create([
                'name' => $item[0],
                'info' => $item[1],
                'deadline' => $item[2],
                'amount' => $item[3],
            ]);
        }
    }
}
