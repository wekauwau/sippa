<?php

namespace Database\Seeders;

use App\Models\Payment;
use Illuminate\Database\Seeder;

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
    }
}
