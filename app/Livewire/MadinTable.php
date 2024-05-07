<?php

namespace App\Livewire;

use App\Models\Madin;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class MadinTable extends Component implements HasTable, HasForms
{
    use InteractsWithTable;
    use InteractsWithForms;

    public function table(Table $table): Table
    {
        $query = Madin::query()
            ->join('lessons', 'lesson_id', '=', 'lessons.id')
            ->join('teachers', 'teacher_user_id', '=', 'teachers.user_id')
            ->join('madin_rooms', 'madin_room_id', '=', 'madin_rooms.id')
            ->where('semester_id', 1)
            ->where('grade_id', 7);

        return $table
            ->query($query)
            ->columns([
                TextColumn::make('day')
                    ->label('Hari'),
                TextColumn::make('lessons.name')
                    ->label('Pelajaran'),
                TextColumn::make('teachers.name')
                    ->label('Pengajar'),
                TextColumn::make('madin_rooms.name')
                    ->label('Tempat'),
            ]);
    }

    public function render(): View
    {
        return view('livewire.filament-table');
    }
}
