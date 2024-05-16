<?php

namespace App\Traits\StudentDataTable;

use App\Models\User;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\ToggleButtons;
use Filament\Tables\Actions\CreateAction;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

trait Actions
{
    private function getCreate()
    {
        return CreateAction::make()
            ->label('Tambah')
            ->form([
                TextInput::make('name')
                    ->label('Nama Lengkap')
                    ->required()
                    ->minLength(1)
                    ->maxLength(255),
                TextInput::make('phone')
                    ->label('Nomor HP')
                    ->tel()
                    ->required()
                    ->prefix('+62')
                    ->minLength(10)
                    ->maxLength(12),
                TextInput::make('username')
                    ->required()
                    ->minLength(1)
                    ->maxLength(255),
                TextInput::make('password')
                    ->password()
                    ->required()
                    ->revealable()
                    ->minLength(5),
                ToggleButtons::make('gender')
                    ->label('Jenis Kelamin')
                    ->options([
                        1 => 'Laki-laki',
                        0 => 'Perempuan',
                    ])
                    ->default(1)
                    ->colors([
                        1 => 'info',
                        0 => 'warning',
                    ])
                    ->grouped(),
            ])
            ->modalHeading('Tambah Santri')
            ->mutateFormDataUsing(function (array $data): array {
                $data['phone'] = "0{$data['phone']}";
                $data['password'] = Hash::make($data['password']);

                return $data;
            })
            ->using(function (array $data): Model {
                return User::create($data);
            });
    }
}
