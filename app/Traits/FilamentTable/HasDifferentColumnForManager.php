<?php

namespace App\Traits\FilamentTable;

use App\Models\Student;
use Filament\Forms\Components\Select;
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

    private function addSelectStudent(): array
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
}
