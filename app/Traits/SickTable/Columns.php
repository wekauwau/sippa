<?php

namespace App\Traits\SickTable;

use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;

trait Columns
{
    private function getColumns(): array
    {
        return [
            TextColumn::make('start')
                ->label('Mulai')
                ->sortable()
                ->searchable(isIndividual: true),
            TextColumn::make('end')
                ->label('Sembuh')
                ->sortable()
                ->searchable(isIndividual: true),
            TextColumn::make('info')
                ->label('Keterangan')
                ->sortable()
                ->searchable(isIndividual: true),
        ];
    }

    private function getColumnsForManager(): array
    {
        return [
            TextColumn::make('student.name_with_room')
                ->label("Santri")
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
