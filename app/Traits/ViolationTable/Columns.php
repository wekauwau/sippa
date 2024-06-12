<?php

namespace App\Traits\ViolationTable;

use App\Traits\FilamentTable\HasDifferentColumnForManager;
use Filament\Tables\Columns\TextColumn;

trait Columns
{
    use HasDifferentColumnForManager;

    private function getColumns(): array
    {
        return [
            TextColumn::make('date')
                ->label('Tanggal')
                ->sortable()
                ->searchable(isIndividual: true),
            TextColumn::make('info')
                ->label('Keterangan')
                ->sortable()
                ->searchable(isIndividual: true),
        ];
    }

    private function getColumnsManager(): array
    {
        return $this->addStudentNameRoom();
    }
}
