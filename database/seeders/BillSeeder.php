<?php

namespace Database\Seeders;

use App\Models\Bill;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'Syahriah bulan Januari',
                null,
                date_create('2024-01-10'),
                '300.000',
            ],
            [
                'Syahriah bulan Februari',
                null,
                date_create('2024-02-10'),
                '300.000',
            ],
            [
                'Ziarah',
                null,
                date_create('2024-02-29'),
                '310.000',
            ],
            [
                'Iuran Ramadhan',
                null,
                date_create('2024-03-06'),
                '110.000',
            ],
            [
                'Syahriah bulan Maret',
                null,
                date_create('2024-03-10'),
                '300.000',
            ],
        ];

        foreach ($data as $item) {
            Bill::create([
                'name' => $item[0],
                'info' => $item[1],
                'deadline' => $item[2],
                'amount' => $item[3],
            ]);
        }

        for ($i = 1; $i <= 5; $i++) {
            DB::table('bills')
                ->where('id', $i)
                ->update(['created_at' => "2024-0{$i}-01 00:00:00"]);
        }

        DB::table('bills')
            ->where('id', 3)
            ->update(['created_at' => '2024-02-20 00:00:00']);
        DB::table('bills')
            ->where('id', 4)
            ->update(['created_at' => '2024-02-25 00:00:00']);
        DB::table('bills')
            ->where('id', 5)
            ->update(['created_at' => '2024-03-01 00:00:00']);
    }
}
