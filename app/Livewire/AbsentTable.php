<?php

namespace App\Livewire;

use App\Models\Absent;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class AbsentTable extends Component implements HasTable, HasForms
{
    use InteractsWithTable;
    use InteractsWithForms;

    public function table(Table $table): Table
    {
        $query = Absent::query();

        return $table
            ->query($query)
            ->columns([
                TextColumn::make('when')
                    ->label('Tanggal')
                    ->sortable()
                    ->searchable(isIndividual: true),
                TextColumn::make('status')
                    ->label('Karena')
                    ->sortable()
                    ->searchable(isIndividual: true),
                TextColumn::make('info')
                    ->label('Keterangan')
                    ->sortable()
                    ->searchable(isIndividual: true),
            ]);
    }

    public function render()
    {
        return view('livewire.absent-table');
    }
}
