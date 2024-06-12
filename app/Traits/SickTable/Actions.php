<?php

namespace App\Traits\SickTable;

use App\Models\Student;
use App\Traits\FilamentTable\HasDifferentColumnForManager;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Get;
use Filament\Tables\Actions\CreateAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;

trait Actions
{
    use HasDifferentColumnForManager;

    private function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->label("Tambah")
                ->form($this->getFormCreate()),
        ];
    }

    private function getBulkActions(): array
    {
        return [
            DeleteBulkAction::make()
                ->modalHeading("Hapus Data yang Dipilih")
                ->modalSubmitActionLabel("Ya, hapus"),
        ];
    }

    private function getActions(): array
    {
        return [
            DeleteAction::make()
                ->modalHeading("Hapus Data Kesehatan")
                ->modalSubmitActionLabel("Ya, hapus"),
            EditAction::make()
                ->modalHeading("Ubah Data Kesehatan")
                ->form($this->getFormEdit()),
        ];
    }

    private function getFormCreate(): array
    {
        return $this->addSelectStudent();
    }

    private function getFormEdit(): array
    {
        return [
            DatePicker::make('start')
                ->label("Mulai")
                ->required()
                ->native(false)
                ->format('Y-m-d')
                ->displayFormat('Y-m-d')
                ->closeOnDateSelection()
                ->default(today())
                ->maxDate(today())
                // DatePicker('end')->minDate()
                // is based on this field
                ->live(),
            DatePicker::make('end')
                ->label("Sembuh")
                ->native(false)
                ->format('Y-m-d')
                ->displayFormat('Y-m-d')
                ->closeOnDateSelection()
                ->minDate(
                    fn (Get $get): string => $get('start')
                )
                ->maxDate(today()),
            TextInput::make('info')
                ->label("Keterangan")
                ->minLength(1)
                ->maxLength(255)
                ->required(),
        ];
    }
}
