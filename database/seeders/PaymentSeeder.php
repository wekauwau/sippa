<?php

namespace Database\Seeders;

use App\Models\Payment;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentSeeder extends Seeder
{
    public function run(): void
    {
        for ($i = 1; $i <= 43; $i++) {
            Payment::create([
                'bill_id' => 4,
                'user_id' => $i,
                'status' => fake()->boolean(),
            ]);
        }

        DB::table('payments')
            ->where('bill_id', '=', 4)
            ->where('user_id', '=', 42)
            ->update(['status' => 0]);

        Payment::create([
            'bill_id' => 2,
            'user_id' => 42,
            'status' => 1,
        ]);
    }
}
