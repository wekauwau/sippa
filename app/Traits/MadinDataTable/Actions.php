<?php

namespace App\Traits\MadinDataTable;

use App\Models\Semester;
use App\Models\Teacher;
use App\Traits\FilamentTable\HasDifferentColumnForManager;
use Filament\Forms\Components\Select;
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
                ->modalHeading("Tambah Data Madin")
                ->form($this->getFormThis()),
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
                ->modalHeading("Hapus Data Madin")
                ->modalSubmitActionLabel("Ya, hapus"),
            EditAction::make()
                ->modalHeading("Ubah Data Madin")
                ->form($this->getFormThis()),
        ];
    }

    private function getFormThis(): array
    {
        $semester_options = Semester::all()->pluck('full_name', 'id');
        $teacher_options = Teacher::all()->pluck('user.name', 'id');

        return [
            Select::make('semester_id')->label("Semester")
                ->required()
                ->native(false)
                ->options($semester_options)
                ->searchable()
                ->getSearchResultsUsing(
                    function (string $search) use ($semester_options): array {
                        if ($search == '') return $semester_options;
                        return $semester_options
                            ->filter(function ($item) use ($search) {
                                return false !== stripos($item, $search);
                            })
                            ->toArray();
                    }
                )
                ->getOptionLabelUsing(
                    function ($value) use ($semester_options): string {
                        return $semester_options[$value];
                    }
                ),
            Select::make('day')->label("Hari")
                ->required()
                ->options([
                    'Ahad' => "Ahad", 'Senin' => "Senin", 'Selasa' => "Selasa", 'Rabu' => "Rabu", 'Jumat' => "Jumat", 'Sabtu' => "Sabtu",
                ])
                ->native(false)
                ->searchable(),
            Select::make('grade_id')->label("Kelas")
                ->required()
                ->relationship(name: 'grade', titleAttribute: 'name')
                ->preload()
                ->native(false)
                ->searchable(),
            Select::make('madin_room_id')->label("Tempat")
                ->required()
                ->relationship(name: 'madin_room', titleAttribute: 'name')
                ->preload()
                ->native(false)
                ->searchable(),
            Select::make('lesson_id')->label("Pelajaran")
                ->required()
                ->relationship(name: 'lesson', titleAttribute: 'name')
                ->preload()
                ->native(false)
                ->searchable(),
            Select::make('teacher_id')->label("Pengajar")
                ->required()
                ->options($teacher_options)
                ->native(false)
                ->searchable()
                ->getSearchResultsUsing(
                    function (string $search) use ($teacher_options): array {
                        if ($search == '') return $teacher_options;
                        return $teacher_options
                            ->filter(function ($item) use ($search) {
                                return false !== stripos($item, $search);
                            })
                            ->toArray();
                    }
                )
                ->getOptionLabelUsing(
                    function ($value) use ($teacher_options): string {
                        return $teacher_options[$value];
                    }
                ),
        ];
    }
}
