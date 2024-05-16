<?php

namespace App\Traits\StudentDataTable;

use App\Models\StudentData;
use App\Models\User;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\ToggleButtons;
use Filament\Tables\Actions\CreateAction;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

trait Actions
{
    private function getTextInput(string $name): TextInput
    {
        return TextInput::make($name)
            ->minLength(1)
            ->maxLength(255);
    }

    private function getPhoneInput(string $name): TextInput
    {
        return TextInput::make($name)
            ->prefix('+62')
            ->tel()
            ->mask('999 9999 9999')
            ->minLength(12)
            ->maxLength(13);
    }

    private function getCreate()
    {
        $user = [
            $this->getTextInput('name')
                ->label('Nama Lengkap')
                ->required(),
            $this->getPhoneInput('phone')
                ->label('Nomor HP')
                ->required(),
            $this->getTextInput('username')
                ->required(),
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
        ];

        $student = [
            DatePicker::make('birth_date')
                ->label('Tanggal Lahir')
                ->native(false)
                ->required()
                ->format('Y-m-d')
                ->displayFormat('Y-m-d')
                ->closeOnDateSelection()
                ->minDate(now()->subYears(30))
                ->maxDate(now()->subYears(15)),
            $this->getTextInput('address')
                ->label('Alamat'),
            $this->getTextInput('father_name')
                ->label('Nama Ayah')
                ->required(),
            $this->getPhoneInput('father_phone_number')
                ->label('Nomor HP Ayah'),
            $this->getTextInput('mother_name')
                ->label('Nama Ibu')
                ->required(),
            $this->getPhoneInput('mother_phone_number')
                ->label('Nomor HP Ibu'),
        ];

        return CreateAction::make()
            ->label('Tambah')
            ->form([
                ...$user,
                ...$student,
            ])
            ->modalHeading('Tambah Santri')
            ->mutateFormDataUsing(function (array $data): array {
                $data['name'] = trim($data['name']);
                $data['username'] = trim($data['username']);
                // Remove whitespaces
                $data['phone'] = preg_replace('/\s+/', '', $data['phone']);
                $data['phone'] = "0{$data['phone']}";
                $data['password'] = Hash::make($data['password']);

                $data['phone_number'] = ''; // TODO: remove
                $data['address'] = trim($data['address']);
                $data['father_name'] = trim($data['father_name']);
                $data['mother_name'] = trim($data['mother_name']);

                return $data;
            })
            ->using(function (array $data): Model {
                $user = User::create($data);

                $data['user_id'] = intval($user->id);
                StudentData::create($data);

                return $user;
            });
    }
}
