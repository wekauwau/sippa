<?php

namespace App\Traits\BillDataTable;

use App\Models\Bill;
use App\Models\Payment;
use App\Models\Student;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\ToggleButtons;
use Filament\Support\RawJs;
use Filament\Tables\Actions\CreateAction;

trait Actions
{
    private function getFormInputs(): array
    {
        return [
            TextInput::make('name')
                ->label("Nama")
                ->minLength(1)
                ->maxLength(255)
                ->required(),
            TextInput::make('info')
                ->label("Keterangan")
                ->minLength(1)
                ->maxLength(255),
            DatePicker::make('deadline')
                ->label("Batas")
                ->native(false)
                ->required()
                ->format('Y-m-d')
                ->displayFormat('Y-m-d')
                ->closeOnDateSelection()
                ->minDate(now()),
            TextInput::make('amount')
                ->label("Jumlah")
                ->inputMode('numeric')
                ->mask(RawJs::make(<<<'JS'
                    $money($input,',','.',0)
                JS))
                ->required(),
            ToggleButtons::make('recipient')
                ->label("Penerima")
                ->helperText(
                    "Abdi: pengurus, ustaz, pegawai usaha pondok, pengajar MTs dan TPA."
                )
                ->options([
                    'student' => "Santri",
                    'servant' => "Abdi",
                ])
                ->default('student')
                ->colors([
                    'student' => 'info',
                    'servant' => 'warning',
                ])
                ->grouped(),
        ];
    }

    private function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->label("Tambah")
                ->form($this->getFormInputs())
                ->modalHeading("Tambah Tagihan")
                ->mutateFormDataUsing(function (array $data): array {
                    $data['name'] = trim($data['name']);
                    $data['info'] = trim($data['info']);

                    $data['amount'] = str_replace(".", "", $data['amount']);
                    $data['amount'] = number_format(
                        $data['amount'],
                        0,
                        ",",
                        "."
                    );

                    return $data;
                })
                ->after(function (array $data, Bill $bill) {
                    if ($data['recipient'] == "student") {
                        $recipient_ids = Student::doesntHave('manager')
                            ->doesntHave('servant')
                            ->doesntHave('user.teacher')
                            ->whereRelation('user', 'active', 1)
                            ->pluck('id');
                    } elseif ($data['recipient'] == "servant") {
                        $recipient_ids = Student::orHas('manager')
                            ->orHas('servant')
                            ->orHas('user.teacher')
                            ->whereRelation('user', 'active', 1)
                            ->pluck('id');
                    }

                    foreach ($recipient_ids as $id) {
                        Payment::create([
                            'bill_id' => $bill->id,
                            'student_id' => $id,
                            'paid' => null,
                        ]);
                    }
                }),
        ];
    }
}
