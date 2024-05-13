<?php

namespace App\Livewire;

use App\Models\StudentData;
use App\Models\User;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Columns\Layout\Grid;
use Filament\Tables\Columns\Layout\Panel;
use Filament\Tables\Columns\Layout\Split;
use Filament\Tables\Columns\Layout\Stack;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class StudentDataTable extends Component implements HasTable, HasForms
{
    use InteractsWithTable;
    use InteractsWithForms;

    public function table(Table $table): Table
    {
        // Querying active students
        $query = StudentData::query()
            ->whereHas('user', function (Builder $query) {
                $query->where('active', 1);
            });

        $student = Stack::make([
            TextColumn::make('user.name')
                ->label('Nama')
                ->sortable()
                ->searchable(),
            TextColumn::make('user.username')
                ->label('Username')
                ->sortable()
                ->searchable(),
            TextColumn::make('phone_number')
                ->label('Nomor')
                ->sortable()
                ->searchable(),
            TextColumn::make('birth_date')
                ->label('Tanggal Lahir')
                ->sortable()
                ->searchable(),
        ]);
        $father = Stack::make([
            TextColumn::make('father_name')
                ->label('Nama Ayah')
                ->sortable()
                ->searchable(),
            TextColumn::make('father_phone_number')
                ->label('Nomor Ayah')
                ->sortable()
                ->searchable(),
        ]);
        $mother = Stack::make([
            TextColumn::make('mother_name')
                ->label('Nama Ibu')
                ->sortable()
                ->searchable(),
            TextColumn::make('mother_phone_number',)
                ->label('Nomor Ibu')
                ->sortable()
                ->searchable(),
        ]);

        return $table
            ->query($query)
            ->columns([
                Grid::make([])->schema([
                    $student,
                    $father,
                    $mother,
                ]),
            ]);
    }

    public function render(): View
    {
        return view('livewire.filament-table');
    }
}
