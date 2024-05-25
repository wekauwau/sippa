<?php

namespace App\Livewire;

use App\Models\User;
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
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class StudentDataTable extends Component implements HasTable, HasForms
{
    use InteractsWithTable;
    use InteractsWithForms;

    use Columns;
    use Actions;

    public function table(Table $table): Table
    {
        $query = User::withWhereHas('student.student_data')
            ->where('active', 1);

        // Add header actions for secretary
        if (
            Auth::user()->student
            ?->manager?->division?->name == 'Sekretaris'
        ) {
            $table
                ->headerActions($this->getHeaderActions())
                ->bulkActions($this->getBulkActions())
                ->actions($this->getActions());
        }

        $columns = [
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
                TextColumn::make(
                    'student.student_data.address'
                )
                    ->label('Alamat')
                    ->sortable()
                    ->searchable()
                    ->columnSpan([
                        'lg' => 2,
                        'xl' => 3,
                    ]),
                LayoutView::make(
                    'filament.table.custom-stack'
                )
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
                LayoutView::make(
                    'filament.table.custom-text-column'
                )
                    ->components([$this->getFather()])
                    ->columnSpan([
                        'xl' => 3,
                    ]),
                LayoutView::make(
                    'filament.table.custom-text-column'
                )
                    ->components([$this->getMother()])
                    ->columnSpan([
                        'xl' => 3,
                    ]),
            ]),
        ];

        return $table
            ->query($query)
            ->columns($columns)
            ->defaultSort('id', 'desc');
    }

    public function render(): View
    {
        return view('livewire.filament-table');
    }
}
