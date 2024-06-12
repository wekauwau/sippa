<?php

namespace App\Livewire;

use App\Models\Violation;
use App\Traits\CheckUser;
use App\Traits\ViolationTable\Actions;
use App\Traits\ViolationTable\Columns;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ViolationDataTable extends Component implements HasTable, HasForms
{
    use InteractsWithTable;
    use InteractsWithForms;

    use CheckUser;

    use Actions;
    use Columns;

    public function table(Table $table): Table
    {
        if (
            $this->getDivisionName(Auth::user()) == "Keamanan"
        ) {
            $table
                ->headerActions($this->getHeaderActions())
                ->bulkActions($this->getBulkActions())
                ->actions($this->getActions());
        }

        return $table
            ->query(Violation::query())
            ->columns($this->getColumnsManager())
            ->defaultSort('id', 'desc');
    }

    public function render(): View
    {
        return view('livewire.filament-table');
    }
}
