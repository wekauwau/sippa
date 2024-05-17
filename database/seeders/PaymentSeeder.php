<?php

namespace Database\Seeders;

use App\Models\Payment;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentSeeder extends Seeder
{
    public function run(): void
    {
        # create paid bills (id: 1 - 4)
        for ($i = 1; $i <= 4; $i++) {
            for ($j = 1; $j <= 43; $j++) {
                $bill = DB::table('bills')
                    ->where('id', $i)
                    ->first(['created_at', 'deadline']);

                Payment::create([
                    'bill_id' => $i,
                    'student_user_id' => $j,
                    'paid' => fake()->dateTimeBetween(
                        $bill->created_at,
                        $bill->deadline,
                    )
                ]);
            }
        }

        for ($j = 1; $j <= 43; $j++) {
            # roll the dice
            $paid = fake()->boolean();
            if ($paid) {
                $bill = DB::table('bills')
                    ->where('id', 5)
                    ->first(['created_at', 'deadline']);

                $val = fake()->dateTimeBetween(
                    $bill->created_at,
                    $bill->deadline,
                );
            } else {
                $val = null;
            }

            Payment::create([
                'bill_id' => 5,
                'student_user_id' => $j,
                'paid' => $val,
            ]);
        }

        DB::table('payments')
            ->where('student_user_id', 20)
            ->where('bill_id', 5)
            ->update(['paid' => null]);
    }
}
