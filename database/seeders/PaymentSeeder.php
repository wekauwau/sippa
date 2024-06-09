<?php

namespace Database\Seeders;

use App\Models\Payment;
use App\Models\Student;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use function Laravel\Prompts\error;

class PaymentSeeder extends Seeder
{
    public function run(): void
    {
        $bills = [
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
                null,
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
                null,
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
        $syahriah_ids = range(1, 14);
        $all_student = [5, 8];
        // Remove ziarah, iuran ramadhan
        foreach ($all_student as $id) {
            unset($syahriah_ids[$id - 1]);
        }

        foreach ($syahriah_ids as $id) {
            $servant = $bills[$id - 1][4];
            if ($servant == 0) {
                // Student only
                $recipient_ids = Student::doesntHave('manager')
                    ->doesntHave('servant')
                    ->doesntHave('user.teacher')
                    ->whereRelation('user', 'active', 1)
                    ->pluck('id');
            } elseif ($servant == 1) {
                // Servant only
                $recipient_ids = Student::orHas('manager')
                    ->orHas('servant')
                    ->orHas('user.teacher')
                    ->whereRelation('user', 'active', 1)
                    ->pluck('id');
            }

            foreach ($recipient_ids as $r_id) {
                $month = $bills[$id - 1][2]->format('m');

                Payment::create([
                    'bill_id' => $id,
                    'student_id' => $r_id,
                    'paid' => date_create("2024-{$month}-10"),
                ]);
            }
        }

        // Randomize 'paid' for Jun
        foreach ([13, 14] as $id) {
            $payments = Payment::where('bill_id', $id)->get();

            foreach ($payments as $payment) {
                $unpaid = rand(0, 1);

                if ($unpaid) {
                    $payment->update(['paid' => null]);
                }
            }
        }

        foreach ($all_student as $id) {
            $recipient_ids = Student::whereRelation('user', 'active', 1)
                ->pluck('id');

            foreach ($recipient_ids as $r_id) {
                Payment::create([
                    'bill_id' => $id,
                    'student_id' => $r_id,
                    'paid' => null,
                ]);
            }
        }
    }
}
