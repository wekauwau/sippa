<?php

namespace App\Livewire;

use App\Models\StudentData;
use App\Traits\StudentDataTable\Actions;
use App\Traits\StudentDataTable\Columns;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Columns\Layout\Grid;
use Filament\Tables\Columns\Layout\Stack;
use Filament\Tables\Columns\Layout\View as LayoutView;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;

class StudentDataTable extends Component implements HasTable, HasForms
{
    use InteractsWithTable;
    use InteractsWithForms;
    use Columns;
    use Actions;

    public function table(Table $table): Table
    {
        // Querying active students
        $query = StudentData::query()
            ->whereHas('user', function (Builder $query) {
                $query->where('active', 1);
            });

        return $table
            ->headerActions([
                $this->getCreate(),
            ])
            ->query($query)
            ->columns([
                Grid::make([
                    'sm' => 2,
                    'lg' => 4,
                    'xl' => 16,
                ])->schema([
                    $this->getStudent()
                        ->columnSpan([
                            'xl' => 3,
                        ]),
                    $this->getPhoneNumber()
                        ->visibleFrom('xl')
                        ->columnSpan([
                            'xl' => 2,
                        ]),
                    $this->getBirthDate()
                        ->visibleFrom('xl')
                        ->columnSpan([
                            'xl' => 2,
                        ]),
                    TextColumn::make('address')
                        ->label('Alamat')
                        ->sortable()
                        ->searchable()
                        ->columnSpan([
                            'lg' => 2,
                            'xl' => 3,
                        ]),
                    LayoutView::make('filament.table.custom-stack')
                        ->components([
                            Stack::make([
                                $this->getFather(),
                                $this->getMother(),
                            ]),
                        ])
                        ->columnSpan([
                            'sm' => 2,
                            'lg' => 1,
                        ])
                        ->hiddenFrom('xl'),
                    LayoutView::make('filament.table.custom-text-column')
                        ->components([
                            $this->getFather()
                        ])
                        ->columnSpan([
                            'xl' => 3,
                        ]),
                    LayoutView::make('filament.table.custom-text-column')
                        ->components([
                            $this->getMother()
                        ])
                        ->columnSpan([
                            'xl' => 3,
                        ]),
                ]),
            ]);
    }

    public function render(): View
    {
        return view('livewire.filament-table');
    }
}
