<?php

namespace App\Traits\MadinDataTable;

use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;

trait Columns
{
    private function getColumns(): array
    {
        return [
            TextColumn::make('semester.full_name')->label("Semester")
                ->searchable(
                    query: function (Builder $query, string $search): Builder {
                        // FIX: can't search "genap" or "ganjil"
                        // because db is:
                        //     boolean('isEven')
                        // instead of:
                        //     string('<name>') = "Ganjil", "Genap"
                        // or there is a way? using collection?
                        return $query->whereRelation('semester', 'start', 'like', "%{$search}%")
                            ->orWhereRelation('semester', 'end', 'like', "%{$search}%");
                    },
                    isIndividual: true
                ),
            TextColumn::make('day')->label("Hari")
                ->searchable(isIndividual: true),
            TextColumn::make('lesson.name')->label("Pelajaran")
                ->searchable(
                    query: function (Builder $query, string $search): Builder {
                        return $query->whereRelation('lesson', 'name', 'like', "%{$search}%");
                    },
                    isIndividual: true
                ),
            TextColumn::make('teacher.user.name')->label("Pengajar")
                ->searchable(
                    query: function (Builder $query, string $search): Builder {
                        return $query->whereRelation('teacher.user', 'name', 'like', "%{$search}%");
                    },
                    isIndividual: true
                ),
            TextColumn::make('madin_room.name')->label("Tempat")
                ->searchable(
                    query: function (Builder $query, string $search): Builder {
                        return $query->whereRelation('madin_room', 'name', 'like', "%{$search}%");
                    },
                    isIndividual: true
                ),
            TextColumn::make('grade.name')->label("Kelas")
                ->searchable(
                    query: function (Builder $query, string $search): Builder {
                        return $query->whereRelation('grade', 'name', 'like', "%{$search}%");
                    },
                    isIndividual: true
                ),
        ];
    }
}
