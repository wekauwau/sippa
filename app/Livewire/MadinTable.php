<?php

namespace App\Livewire;

use App\Models\Grade;
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

    private function getGrades()
    {
        return Grade::all()
            ->pluck('name', 'id')
            ->toArray();
    }

    public function table(Table $table): Table
    {
        $query = Madin::query()
            ->with('grade')
            ->with('madin_room')
            ->with('lesson')
            ->with('teacher')
            ->where('semester_id', 1);

        return $table
            ->query($query)
            ->columns([
                TextColumn::make('day')
                    ->label('Hari'),
                TextColumn::make('lesson.name')
                    ->label('Pelajaran'),
                TextColumn::make('teacher.user.name')
                    ->label('Pengajar'),
                TextColumn::make('madin_room.name')
                    ->label('Tempat'),
            ])
            ->filters([
                SelectFilter::make('grade_id')
                    ->label('Kelas')
                    ->options($this->getGrades())
                    ->default(7)
                    ->selectablePlaceholder(false)
            ]);
    }

    public function render(): View
    {
        return view('livewire.filament-table');
    }
}
