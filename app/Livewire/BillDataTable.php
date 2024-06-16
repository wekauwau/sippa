<?php

namespace App\Livewire;

use App\Models\Bill;
use App\Traits\BillDataTable\Actions;
use App\Traits\CheckUser;
use Filament\Forms\Components\ToggleButtons;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Table;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class BillDataTable extends Component implements HasTable, HasForms
{
    use InteractsWithTable;
    use InteractsWithForms;

    use CheckUser;

    use Actions;

    public function table(Table $table): Table
    {
        if (
            $this->getDivisionName(Auth::user()) == 'Bendahara'
        ) {
            $table->headerActions($this->getHeaderActions())
                ->bulkActions($this->getBulkActions())
                ->actions($this->getActions());
        }

        return $table
            ->query(Bill::query())
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
                TextColumn::make('recipient')->label('Penerima')
                    ->sortable()
                    ->searchable(),
            ])
            ->defaultSort('id', 'desc');
    }

    public function render(): View
    {
        return view('livewire.filament-table');
    }
}
