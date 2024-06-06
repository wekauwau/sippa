<?php

namespace App\Traits\BillDataTable;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
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
        ];
    }
}
