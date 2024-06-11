<?php

namespace App\Traits\SickTable;

use App\Models\Student;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Get;
use Filament\Tables\Actions\CreateAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;

trait Actions
{
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
            EditAction::make()
                ->modalHeading("Ubah Data Kesehatan")
                ->form($this->getFormEdit()),
        ];
    }

    private function getFormCreate(): array
    {
        $student_options = Student::whereRelation(
            'user',
            'active',
            1
        )->get()->pluck('name_with_room', 'id');

        return [
            Select::make('student_id')
                ->label("Santri")
                ->required()
                ->native(false)
                ->options($student_options)
                ->searchable()
                ->getSearchResultsUsing(
                    function (string $search) use ($student_options): array {
                        if ($search == '') return $student_options;
                        return $student_options
                            ->filter(function ($item) use ($search) {
                                return false !== stripos($item, $search);
                            })
                            ->toArray();
                    }
                )
                ->getOptionLabelUsing(
                    function ($value) use ($student_options): string {
                        return $student_options[$value];
                    }
                ),
            ...$this->getFormEdit(),
        ];
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
            TextInput::make('info')
                ->label("Keterangan")
                ->minLength(1)
                ->maxLength(255)
                ->required(),
        ];
    }
}
