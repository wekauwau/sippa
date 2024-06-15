<?php

namespace App\Traits\MadinDataTable;

use App\Models\Absent;
use App\Models\Madin;
use App\Models\Semester;
use App\Models\Teacher;
use App\Traits\FilamentTable\HasDifferentColumnForManager;
use Filament\Forms\Components\Select;
use Filament\Tables\Actions\CreateAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ForceDeleteAction;
use Illuminate\Database\Eloquent\Builder;

trait Actions
{
    use HasDifferentColumnForManager;

    private function getHeaderActions(): array
    {
        return [
            CreateAction::make()->label("Tambah")
                ->model(Madin::class)
                ->modalHeading("Tambah Data Madin")
                ->form($this->getFormThis()),
        ];
    }

    private function getBulkActions(): array
    {
        return [
            DeleteBulkAction::make()
                ->modalHeading("Hapus Data yang Dipilih")
                ->modalDescription("Apakah Anda yakin? Data terkait (kehadiran) juga akan dihapus.")
                ->modalSubmitActionLabel("Ya, hapus")
                ->before(function (DeleteBulkAction $action) {
                    foreach ($action->getRecords() as $record) {
                        Absent::where('madin_id', $record->id)->delete();
                    }
                })
        ];
    }

    private function getActions(): array
    {
        return [
            DeleteAction::make()
                ->modalHeading("Hapus Data Madin")
                ->modalSubmitActionLabel("Ya, hapus")
                ->before(function (DeleteAction $action) {
                    Absent::where('madin_id', $action->getRecord()->id)
                        ->delete();
                }),
            EditAction::make()
                ->modalHeading("Ubah Data Madin")
                ->form($this->getFormThis()),
        ];
    }

    private function getFormThis(): array
    {
        return [
            Select::make('semester_id')->label("Semester")
                ->required()
                ->native(false)
                ->relationship(name: 'semester')
                ->preload()
                ->getOptionLabelFromRecordUsing(function (Semester $record): string {
                    return "$record->start - $record->end $record->semester";
                })
                ->searchable(),
            Select::make('day')->label("Hari")
                ->required()
                ->native(false)
                ->options([
                    'Ahad' => "Ahad", 'Senin' => "Senin", 'Selasa' => "Selasa", 'Rabu' => "Rabu", 'Jumat' => "Jumat", 'Sabtu' => "Sabtu",
                ])
                ->searchable(),
            Select::make('grade_id')->label("Kelas")
                ->required()
                ->native(false)
                ->relationship(name: 'grade', titleAttribute: 'name')
                ->preload()
                ->searchable(),
            Select::make('madin_room_id')->label("Tempat")
                ->required()
                ->native(false)
                ->relationship(name: 'madin_room', titleAttribute: 'name')
                ->preload()
                ->searchable(),
            Select::make('lesson_id')->label("Pelajaran")
                ->required()
                ->relationship(name: 'lesson', titleAttribute: 'name')
                ->preload()
                ->native(false)
                ->searchable(),
            Select::make('teacher_id')->label("Pengajar")
                ->required()
                ->native(false)
                ->relationship(
                    name: 'teacher',
                    modifyQueryUsing: fn (Builder $query) => $query->with('user:id,name'),
                )
                ->preload()
                ->getOptionLabelFromRecordUsing(function (Teacher $record): string {
                    return $record->user['name'];
                })
                ->searchable()
        ];
    }
}
