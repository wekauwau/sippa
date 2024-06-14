<?php

namespace App\Livewire;

use App\Models\Madin;
use App\Traits\CheckUser;
use App\Traits\MadinDataTable\Actions;
use App\Traits\MadinDataTable\Columns;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class MadinDataTable extends Component implements HasTable, HasForms
{
    use InteractsWithTable;
    use InteractsWithForms;

    use CheckUser;

    use Actions;
    use Columns;

    public function table(Table $table): Table
    {
        if ($this->getDivisionName(Auth::user()) == "Pendidikan") {
            $table->headerActions($this->getHeaderActions())
                ->bulkActions($this->getBulkActions())
                ->actions($this->getActions());
        }

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
