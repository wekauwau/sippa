<?php

namespace App\Livewire;

use App\Models\Sick;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class SickTable extends Component implements HasTable, HasForms
{
    use InteractsWithTable;
    use InteractsWithForms;

    public function table(Table $table): Table
    {
        $query = Sick::query();

        return $table
            ->query($query)
            ->columns([
                TextColumn::make('start')
                    ->label('Mulai')
                    ->sortable()
                    ->searchable(isIndividual: true)
                    ->width('25%'),
                TextColumn::make('end')
                    ->label('Sembuh')
                    ->sortable()
                    ->searchable(isIndividual: true)
                    ->width('25%'),
                TextColumn::make('info')
                    ->label('Keterangan')
                    ->sortable()
                    ->searchable(isIndividual: true),
            ])
            ->filters([
                // ...
            ])
            ->actions([
                // ...
            ])
            ->bulkActions([
                // ...
            ]);
    }

    public function render(): View
    {
        return view('livewire.sick-table');
    }
}
