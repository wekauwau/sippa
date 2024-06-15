<?php

namespace App\Traits\MadinDataTable;

use Filament\Tables\Columns\TextColumn;

trait Columns
{
    private function getColumns(): array
    {
        return [
            TextColumn::make('semester.full_name')->label("Semester")
                ->searchable(
                    ['start', 'end', 'semester'],
                    isIndividual: true
                ),
            TextColumn::make('day')->label("Hari")
                ->searchable(isIndividual: true),
            TextColumn::make('lesson.name')->label("Pelajaran")
                ->searchable(isIndividual: true),
            TextColumn::make('teacher.user.name')->label("Pengajar")
                ->searchable(isIndividual: true),
            TextColumn::make('madin_room.name')->label("Tempat")
                ->searchable(isIndividual: true),
            TextColumn::make('grade.name')->label("Kelas")
                ->searchable(isIndividual: true),
        ];
    }
}
