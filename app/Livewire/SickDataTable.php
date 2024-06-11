<?php

namespace App\Livewire;

use App\Models\Sick;
use App\Traits\SickTable\Columns;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class SickDataTable extends Component implements HasTable, HasForms
{
    use InteractsWithTable;
    use InteractsWithForms;

    use Columns;

    public function table(Table $table): Table
    {
        return $table
            ->query(
                Sick::query()
            )
            ->columns(
                $this->getColumnsForManager(),
            );
    }

    public function render(): View
    {
        return view('livewire.filament-table');
    }
}
