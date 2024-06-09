<?php

namespace App\Livewire;

use App\Models\Bill;
use App\Traits\BillDataTable\Actions;
use App\Traits\CheckUser;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Illuminate\Contracts\View\View;
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
        $query = Bill::query();

        if (
            $this->getDivisionName(Auth::user()) == 'Bendahara'
        ) {
            $table->headerActions($this->getHeaderActions())
                ->bulkActions($this->getBulkActions())
                ->actions($this->getActions());
        }

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
                TextColumn::make('servant')
                    ->label('Penerima')
                    ->default('null')  // handling null value
                    ->formatStateUsing(function (string $state): string {
                        if ($state == 'null') {
                            return "Santri";
                        } elseif ($state == 0) {
                            return "Santri non-abdi";
                        } elseif ($state == 1) {
                            return "Santri abdi";
                        }
                    }),
            ])
            ->defaultSort('id', 'desc');
    }

    public function render(): View
    {
        return view('livewire.filament-table');
    }
}
