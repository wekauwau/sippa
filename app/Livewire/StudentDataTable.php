<?php

namespace App\Livewire;

use App\Models\StudentData;
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
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class StudentDataTable extends Component implements HasTable, HasForms
{
    use InteractsWithTable;
    use InteractsWithForms;

    private function getPhoneNumber(): TextColumn
    {
        return TextColumn::make('phone_number')
            ->label('Nomor')
            ->sortable()
            ->searchable();
    }

    private function getBirthDate(): TextColumn
    {
        return TextColumn::make('birth_date')
            ->label('Tanggal Lahir')
            ->sortable()
            ->searchable();
    }

    private function getFather(): Stack
    {
        return Stack::make([
            TextColumn::make('father_name')
                ->label('Nama Ayah')
                ->sortable()
                ->searchable(),
            TextColumn::make('father_phone_number')
                ->label('Nomor Ayah')
                ->sortable()
                ->searchable(),
        ]);
    }

    private function getMother(): Stack
    {
        return Stack::make([
            TextColumn::make('mother_name')
                ->label('Nama Ibu')
                ->sortable()
                ->searchable(),
            TextColumn::make('mother_phone_number',)
                ->label('Nomor Ibu')
                ->sortable()
                ->searchable(),
        ]);
    }

    public function table(Table $table): Table
    {
        // Querying active students
        $query = StudentData::query()
            ->whereHas('user', function (Builder $query) {
                $query->where('active', 1);
            });

        $student = Stack::make([
            TextColumn::make('user.name')
                ->label('Nama')
                ->sortable()
                ->searchable(),
            TextColumn::make('user.username')
                ->label('Username')
                ->sortable()
                ->searchable(),
            $this->getPhoneNumber()
                ->hiddenFrom('xl'),
            $this->getBirthDate()
                ->hiddenFrom('xl'),
        ]);

        return $table
            ->query($query)
            ->columns([
                Grid::make([
                    'sm' => 2,
                    'lg' => 4,
                    'xl' => 16,
                ])->schema([
                    $student
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
