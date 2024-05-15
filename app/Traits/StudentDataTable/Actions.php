<?php

namespace App\Traits\StudentDataTable;

use App\Models\User;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\CreateAction;

trait Actions
{
    private function getCreate()
    {
        return CreateAction::make()
            ->color('warning')
            ->form([
                TextInput::make('Nama')
                    ->required()
                    ->minLength(1)
                    ->maxLength(255),
            ]);
    }
}
