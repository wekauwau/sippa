<?php

namespace App\Livewire;

use App\Models\Bill;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class BillDataTable extends Component implements HasTable, HasForms
{
    use InteractsWithTable;
    use InteractsWithForms;

    public function table(Table $table): Table
    {
        $query = Bill::query();

        return $table
            ->query($query)
            ->columns([
                TextColumn::make('name')
                    ->label('Nama')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('info')
                    ->label('Keterangan')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('deadline')
                    ->label('Batas')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('amount')
                    ->label('Jumlah')
                    ->sortable()
                    ->searchable(),
            ]);
    }

    public function render(): View
    {
        return view('livewire.filament-table');
    }
}
