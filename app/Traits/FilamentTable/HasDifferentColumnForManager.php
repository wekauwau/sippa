<?php

namespace App\Traits\FilamentTable;

use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;

trait HasDifferentColumnForManager
{
    private function addStudentNameRoom(): array
    {
        return [
            TextColumn::make('student.name_with_room')
                ->label("Santri")
                ->formatStateUsing(
                    fn (string $state): string => nl2br($state)
                )
                ->html()
                ->searchable(
                    query: function (Builder $query, string $search): Builder {
                        return $query
                            ->whereRelation(
                                'student.user',
                                'name',
                                'like',
                                "%{$search}%"
                            )
                            ->orWhereRelation(
                                'student.room',
                                'name',
                                'like',
                                "%{$search}%"
                            )
                            ->orWhereRelation(
                                'student.room.room_group',
                                'name',
                                'like',
                                "%{$search}%"
                            );
                    },
                    isIndividual: true,
                ),
            ...$this->getColumns(),
        ];
    }
}
