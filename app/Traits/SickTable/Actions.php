<?php

namespace App\Traits\SickTable;

use App\Models\Student;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Get;
use Filament\Tables\Actions\CreateAction;

trait Actions
{
    private function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->label("Tambah")
                ->form($this->getFormInputs()),
        ];
    }

    // TODO:
    private function getBulkActions(): array
    {
        return [];
    }

    // TODO:
    private function getActions(): array
    {
        return [];
    }

    private function getFormInputs(): array
    {
        return [
            Select::make('student_id')
                ->label("Santri")
                ->placeholder("pl")
                ->required()
                ->native(false)
                ->options(
                    Student::all()
                        ->pluck('name_with_room', 'id')
                ),
            DatePicker::make('start')
                ->label("Mulai")
                ->required()
                ->native(false)
                ->format('Y-m-d')
                ->displayFormat('Y-m-d')
                ->closeOnDateSelection()
                ->default(now())
                ->maxDate(now())
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
                ->maxDate(now()),
        ];
    }
}
