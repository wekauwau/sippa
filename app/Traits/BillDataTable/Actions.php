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
        ];


        if ($with_recipient) {
            array_push(
                $result,
                ToggleButtons::make('recipient')
                    ->label("Penerima")
                    ->helperText(
                        "Santri abdi: pengurus, ustaz, pegawai usaha pondok, pengajar MTs dan TPA."
                    )
                    ->options([
                        'all' => "Santri",
                        'student' => "Santri non-abdi",
                        'servant' => "Santri abdi",
                    ])
                    ->default('all')
                    ->colors([
                        'all' => 'success',
                        'student' => 'info',
                        'servant' => 'warning',
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

                    $data['servant'] = null;
                    if ($data['recipient'] == 'student') {
                        $data['servant'] = 0;
                    } elseif ($data['recipient'] == 'servant') {
                        $data['servant'] = 1;
                    }

                    return $data;
                })
                ->after(function (array $data, Bill $bill) {
                    if ($data['recipient'] == "all") {
                        $recipient_ids = Student::whereRelation('user', 'active', 1)
                            ->pluck('id');
                    } elseif ($data['recipient'] == "student") {
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
