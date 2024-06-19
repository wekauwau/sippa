<?php

namespace App\Traits\MadinDataTable;

use Filament\Tables\Columns\TextColumn;

trait Columns
{
    private function getColumns(): array
    {
        return [
            TextColumn::make('semester.full_name')->label("Semester")
                ->sortable(['start', 'end', 'semester'])
                ->searchable(
                    ['start', 'end', 'semester'],
                    isIndividual: true
                ),
            TextColumn::make('day')->label("Hari")
                ->sortable()
                ->searchable(isIndividual: true),
            TextColumn::make('lesson.name')->label("Pelajaran")
                ->sortable()
                ->searchable(isIndividual: true),
            TextColumn::make('teacher.user.name')->label("Pengajar")
                ->sortable()
                ->searchable(isIndividual: true),
            TextColumn::make('madin_room.name')->label("Tempat")
                ->sortable()
                ->searchable(isIndividual: true),
            TextColumn::make('grade.name')->label("Kelas")
                ->sortable()
                ->searchable(isIndividual: true),
        ];
    }
}
