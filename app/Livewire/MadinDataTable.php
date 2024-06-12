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

class MadinDataTable extends Component implements HasTable, HasForms
{
    use InteractsWithTable;
    use InteractsWithForms;

    public function table(Table $table): Table
    {
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
