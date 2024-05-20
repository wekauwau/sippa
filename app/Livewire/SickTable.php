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
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class SickTable extends Component implements HasTable, HasForms
{
    use InteractsWithTable;
    use InteractsWithForms;

    public function table(Table $table): Table
    {
        $query = Sick::query()
            ->where('student_id', Auth::id());

        return $table
            ->query($query)
            ->columns([
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
            ]);
    }

    public function render(): View
    {
        return view('livewire.filament-table');
    }
}
