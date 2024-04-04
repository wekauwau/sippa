<?php

namespace Database\Seeders;

use App\Models\Payment;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentSeeder extends Seeder
{
    public function run(): void
    {
        # paid bill (id: 1-4)
        for ($j = 1; $j <= 4; $j++) {
            for ($i = 1; $i <= 43; $i++) {
                Payment::create([
                    'bill_id' => $j,
                    'user_id' => $i,
                    'status' => 1,
                ]);
            }
        }

        for ($i = 1; $i <= 43; $i++) {
            Payment::create([
                'bill_id' => 5,  # syahriah Mar
                'user_id' => $i,
                'status' => fake()->boolean(),
            ]);
        }

        DB::table('payments')
            ->where('user_id', 42)
            ->where('bill_id', 5)
            ->update(['status' => 0]);
    }
}
