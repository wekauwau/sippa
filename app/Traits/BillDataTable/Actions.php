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
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Livewire\Component;

trait Actions
{
    private function getFormInputs(bool $with_recipient = true): array
    {
        $result = [
            TextInput::make('name')->label("Nama")
                ->minLength(1)
                ->maxLength(255)
                ->required(),
            TextInput::make('info')->label("Keterangan")
                ->minLength(1)
                ->maxLength(255),
            DatePicker::make('deadline')->label("Batas")
                ->native(false)
                ->required()
                ->format('Y-m-d')
                ->displayFormat('Y-m-d')
                ->closeOnDateSelection(),
            TextInput::make('amount')->label("Jumlah")
                ->inputMode('numeric')
                ->mask(RawJs::make(<<<'JS'
                    $money($input,',','.',0)
                JS))
                ->required(),
        ];

        if ($with_recipient) {
            array_push(
                $result,
                ToggleButtons::make('recipient')->label("Penerima")
                    ->helperText(
                        "Santri abdi: pengurus, ustaz, pegawai usaha pondok, pengajar MTs dan TPA."
                    )
                    ->options([
                        'Santri' => "Santri",
                        'Santri non-abdi' => "Santri non-abdi",
                        'Santri abdi' => "Santri abdi",
                    ])
                    ->default('all')
                    ->colors([
                        'Santri' => 'success',
                        'Santri non-abdi' => 'info',
                        'Santri abdi' => 'warning',
                    ])
                    ->grouped()
            );
        }

        return $result;
    }

    private function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->model(Bill::class)
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
                    $active_student_ids = Student::whereRelation('user', 'active', 1)->get();

                    if ($data['recipient'] == "Santri") {
                        $recipient_ids = $active_student_ids->pluck('id');
                    } elseif ($data['recipient'] == "Santri non-abdi") {
                        $recipient_ids = $active_student_ids->toQuery()
                            ->doesntHave('manager')
                            ->doesntHave('servant')
                            ->doesntHave('user.teacher')
                            ->pluck('id');
                    } elseif ($data['recipient'] == "Santri abdi") {
                        $recipient_ids = $active_student_ids->toQuery()
                            ->has('manager')
                            ->orHas('servant')
                            ->orHas('user.teacher')
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

    private function getBulkActions(): array
    {
        return [
            DeleteBulkAction::make()
                ->modalHeading("Hapus Data yang Dipilih")
                ->modalDescription("Apakah Anda yakin? Data terkait (tagihan tiap santri) juga akan dihapus.")
                ->modalSubmitActionLabel("Ya, hapus")
                ->before(function (Component $livewire) {
                    foreach ($livewire->getSelectedTableRecords() as $record) {
                        Payment::where('bill_id', $record->id)->delete();
                    }
                }),
        ];
    }

    private function getActions(): array
    {
        return [
            EditAction::make()
                ->modalHeading("Ubah Data Tagihan")
                ->form($this->getFormInputs(false)),
            DeleteAction::make()
                ->modalHeading("Hapus Data Tagihan")
                ->modalDescription("Apakah Anda yakin? Data terkait (tagihan tiap santri) juga akan dihapus.")
                ->modalSubmitActionLabel("Ya, hapus")
                ->before(function (Bill $bill) {
                    Payment::where('bill_id', $bill->id)->delete();
                }),
        ];
    }
}
