<?php

namespace App\Livewire;

use App\Models\Violation;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class ViolationTable extends Component implements HasTable, HasForms
{
    use InteractsWithTable;
    use InteractsWithForms;

    public function table(Table $table): Table
    {
        $query = Violation::query();

        return $table
            ->query($query)
            ->columns([
                TextColumn::make('date')
                    ->label('Tanggal')
                    ->sortable()
                    ->searchable(isIndividual: true),
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
        return view('livewire.violation-table');
    }
}
