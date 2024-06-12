<?php

namespace App\Livewire;

use App\Models\Madin;
use App\Traits\MadinDataTable\Columns;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class MadinDataTable extends Component implements HasTable, HasForms
{
    use InteractsWithTable;
    use InteractsWithForms;

    use Columns;

    public function table(Table $table): Table
    {
        return $table
            ->query(Madin::query())
            ->columns($this->getColumns())
            ->defaultSort('id', 'desc');
    }

    public function render(): View
    {
        return view('livewire.filament-table');
    }
}
