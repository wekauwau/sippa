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

class PaymentTable extends Component implements HasTable, HasForms
{
    use InteractsWithTable;
    use InteractsWithForms;

    public function table(Table $table): Table
    {
        $query = Payment::query()
            ->with('bill')
            ->where('student_id', Auth::id())
            ->whereNotNull('paid');

        return $table
            ->query($query)
            ->columns([
                TextColumn::make('bill.name')
                    ->label('Nama')
                    ->sortable()
                    ->searchable(isIndividual: true),
                TextColumn::make('bill.deadline')
                    ->label('Batas')
                    ->sortable()
                    ->searchable(isIndividual: true),
                TextColumn::make('bill.amount')
                    ->label('Jumlah')
                    ->sortable()
                    ->searchable(isIndividual: true),
                TextColumn::make('paid')
                    ->label('Dibayar')
                    ->sortable()
                    ->searchable(isIndividual: true),
            ])
            ->defaultSort('paid', 'desc');
    }

    public function render(): View
    {
        return view('livewire.filament-table');
    }
}
