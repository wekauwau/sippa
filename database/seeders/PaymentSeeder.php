<?php

namespace Database\Seeders;

use App\Models\Bill;
use App\Models\Payment;
use App\Models\Student;
use Illuminate\Database\Seeder;

class PaymentSeeder extends Seeder
{
    public function run(): void
    {
        $bills = Bill::all();
        $students = Student::whereRelation('user', 'active', 1)->get();

        foreach ($bills as $bill) {
            switch ($bill->recipient) {
                case "Santri":
                    $recipient_ids = $students->pluck('id');
                    break;
                case "Santri non-abdi":
                    $recipient_ids = $students->toQuery()
                        ->doesntHave('manager')
                        ->doesntHave('servant')
                        ->doesntHave('user.teacher')
                        ->pluck('id');
                    break;
                case "Santri abdi":
                    $recipient_ids = $students->toQuery()
                        ->has('manager')
                        ->orHas('servant')
                        ->orHas('user.teacher')
                        ->pluck('id');
                    break;
            }

            foreach ($recipient_ids as $student_id) {
                Payment::create([
                    'bill_id' => $bill->id,
                    'student_id' => $student_id,
                    'paid' => $bill->deadline,
                ]);
            }
        }

        // Randomize 'paid' for Jun
        foreach ([13, 14] as $bill_id) {
            $payments = Payment::where('bill_id', $bill_id)->get();

            foreach ($payments as $payment) {
                if (rand(0, 1)) {
                    $payment->update(['paid' => null]);
                }
            }
        }
    }
}
