<?php

namespace App\Livewire;

use App\Models\Payment;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class BillTable extends Component implements HasTable, HasForms
{
    use InteractsWithTable;
    use InteractsWithForms;

    public function table(Table $table): Table
    {
        $query = Payment::query()
            ->join('bills', 'bill_id', '=', 'bills.id')
            ->where('payments.user_id', Auth::id())
            ->whereNull('paid');

        return $table
            ->query($query)
            ->columns([
                TextColumn::make('name')
                    ->label('Nama')
                    ->sortable()
                    ->searchable(isIndividual: true),
                TextColumn::make('deadline')
                    ->label('Batas')
                    ->sortable()
                    ->searchable(isIndividual: true),
                TextColumn::make('amount')
                    ->label('Jumlah')
                    ->sortable()
                    ->searchable(isIndividual: true),
            ]);
    }

    public function render(): View
    {
        return view('livewire.bill-table');
    }
}
