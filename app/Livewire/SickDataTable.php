<?php

namespace App\Livewire;

use App\Models\Sick;
use App\Traits\CheckUser;
use App\Traits\SickTable\Actions;
use App\Traits\SickTable\Columns;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class SickDataTable extends Component implements HasTable, HasForms
{
    use InteractsWithTable;
    use InteractsWithForms;

    use CheckUser;

    use Columns;
    use Actions;

    public function table(Table $table): Table
    {
        if (
            $this->getDivisionName(Auth::user()) == "Kesehatan"
        ) {
            $table
                ->headerActions($this->getHeaderActions())
                ->bulkActions($this->getBulkActions())
                ->actions($this->getActions());
        }

        return $table
            ->query(Sick::query())
            ->columns($this->getColumnsForManager(),)
            ->defaultSort('id', 'desc');
    }

    public function render(): View
    {
        return view('livewire.filament-table');
    }
}
