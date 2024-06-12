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
            ->defaultSort('id', 'desc')
            ->filters([
                Filter::make('servant')
                    ->form([
                        ToggleButtons::make('recipient')
                            ->label("Penerima")
                            ->options([
                                'null' => "Santri",
                                0 => "Santri non-abdi",
                                1 => "Santri abdi",
                            ]),
                    ])
                    ->indicateUsing(function (array $data): ?string {
                        if ($data['recipient'] == null) return null;

                        $prefix = "Penerima:";
                        switch ($data['recipient']) {
                            case 'null':
                                return "$prefix Santri";
                            case 0:
                                return "$prefix Santri non-abdi";
                            case 1;
                                return "$prefix Santri abdi";
                        }
                    })
                    ->query(function (Builder $query, array $data): Builder {
                        if ($data['recipient'] == null) return $query;
                        if ($data['recipient'] == 'null') {
                            $data['recipient'] = null;
                        }
                        return $query->where('servant', $data['recipient']);
                    }),
            ]);
    }

    public function render(): View
    {
        return view('livewire.filament-table');
    }
}
