<?php

namespace Database\Seeders;

use App\Models\Bill;
use Illuminate\Database\Seeder;

class BillSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'Syahriah bulan Januari',
                null,
                date_create('2024-01-10'),
                '300.000',
                0,
            ],
            [
                'Syahriah bulan Januari (potongan)',
                null,
                date_create('2024-01-10'),
                '200.000',
                1,
            ],
            [
                'Syahriah bulan Februari',
                null,
                date_create('2024-02-10'),
                '300.000',
                0,
            ],
            [
                'Syahriah bulan Februari (potongan)',
                null,
                date_create('2024-02-10'),
                '200.000',
                1,
            ],
            [
                'Ziarah',
                null,
                date_create('2024-02-29'),
                '310.000',
            ],
            [
                'Syahriah bulan Maret',
                null,
                date_create('2024-03-10'),
                '300.000',
                0,
            ],
            [
                'Syahriah bulan Maret (potongan)',
                null,
                date_create('2024-03-10'),
                '200.000',
                1,
            ],
            [
                'Iuran Ramadhan',
                null,
                date_create('2024-03-06'),
                '110.000',
            ],
            [
                'Syahriah bulan April',
                null,
                date_create('2024-04-10'),
                '300.000',
                0,
            ],
            [
                'Syahriah bulan April (potongan)',
                null,
                date_create('2024-04-10'),
                '200.000',
                1,
            ],
            [
                'Syahriah bulan Mei',
                null,
                date_create('2024-05-10'),
                '300.000',
                0,
            ],
            [
                'Syahriah bulan Mei (potongan)',
                null,
                date_create('2024-05-10'),
                '200.000',
                1,
            ],
            [
                'Syahriah bulan Juni',
                null,
                date_create('2024-06-10'),
                '300.000',
                0,
            ],
            [
                'Syahriah bulan Juni (potongan)',
                null,
                date_create('2024-06-10'),
                '200.000',
                1,
            ],
        ];

        foreach ($data as $item) {
            Bill::create([
                'name' => $item[0],
                'info' => $item[1],
                'deadline' => $item[2],
                'amount' => $item[3],
                'servant' => $item[4],
            ]);
        }

        // created_at at 1 each month for Syahriah
        $counter = 1;
        foreach ([
            [1, 2],
            [3, 4],
            [6, 7],
            [9, 10],
            [11, 12],
            [13, 14],
        ] as $ids) {
            foreach ($ids as $id) {
                Bill::where('id', $id)
                    ->update([
                        'created_at' => date_create("2024-{$counter}-01"),
                        'updated_at' => date_create("2024-{$counter}-01"),
                    ]);
            }
            $counter++;
        }

        // Ziarah
        Bill::where('id', 5)
            ->update([
                'created_at' => date_create("2024-02-01"),
                'updated_at' => date_create("2024-02-01"),
            ]);

        // Iuran ramadhan
        Bill::where('id', 8)
            ->update([
                'created_at' => date_create("2024-03-01"),
                'updated_at' => date_create("2024-03-01"),
            ]);
    }
}
