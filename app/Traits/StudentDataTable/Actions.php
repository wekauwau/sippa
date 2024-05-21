<?php

namespace App\Traits\StudentDataTable;

use App\Models\Grade;
use App\Models\Room;
use App\Models\Student;
use App\Models\StudentData;
use App\Models\User;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\ToggleButtons;
use Filament\Tables\Actions\CreateAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
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

    private function getFormInputs(): array
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

        $room_options = Room::all()->pluck('name_with_room_group', 'id');
        $grade_options = Grade::all()->pluck('name', 'id');

        $student = [
            Select::make('student.room_id')
                ->label('Kamar')
                ->native(false)
                ->options($room_options)
                ->searchable()
                ->getSearchResultsUsing(
                    function (string $search) use ($room_options): array {
                        return $room_options
                            ->filter(function ($item) use ($search) {
                                return false !== stripos(
                                    $item,
                                    $search
                                );
                            })
                            ->toArray();
                    }
                )
                ->getOptionLabelUsing(
                    function ($value) use ($room_options): string {
                        return $room_options[$value];
                    }
                ),
            Select::make('student.grade_id')
                ->label('Kelas')
                ->native(false)
                ->options($grade_options),
        ];

        $student_data = [
            DatePicker::make('student.student_data.birth_date')
                ->label('Tanggal Lahir')
                ->native(false)
                ->required()
                ->format('Y-m-d')
                ->displayFormat('Y-m-d')
                ->closeOnDateSelection()
                ->minDate(now()->subYears(30))
                ->maxDate(now()->subYears(15)),
            $this->getTextInput('student.student_data.address')
                ->label('Alamat')
                ->required(),
            $this->getTextInput('student.student_data.father_name')
                ->label('Nama Ayah')
                ->required(),
            $this->getPhoneInput('student.student_data.father_phone_number')
                ->label('Nomor HP Ayah'),
            $this->getTextInput('student.student_data.mother_name')
                ->label('Nama Ibu')
                ->required(),
            $this->getPhoneInput('student.student_data.mother_phone_number')
                ->label('Nomor HP Ibu'),
        ];

        return [
            ...$user,
            ...$student_data,
            ...$student,
        ];
    }

    private function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->label('Tambah')
                ->form($this->getFormInputs())
                ->modalHeading('Tambah Santri')
                ->mutateFormDataUsing(function (array $data): array {
                    $data['name'] = trim($data['name']);
                    $data['username'] = trim($data['username']);
                    // Remove whitespaces
                    $data['phone'] = preg_replace('/\s+/', '', $data['phone']);
                    $data['phone'] = "0{$data['phone']}";
                    $data['password'] = Hash::make($data['password']);

                    $data['address'] = trim($data['address']);
                    $data['father_name'] = trim($data['father_name']);
                    $data['mother_name'] = trim($data['mother_name']);

                    return $data;
                })
                ->after(function (array $data, User $user) {
                    $data['user_id'] = $user->getKey();
                    $student = Student::create($data);

                    $data['student_id'] = $student->getKey();
                    StudentData::create($data);
                })
        ];
    }

    private function getBulkActions(): array
    {
        return [
            DeleteBulkAction::make(),
        ];
    }

    private function getActions(): array
    {
        return [
            EditAction::make()
                ->mutateRecordDataUsing(function (User $user): array {
                    return $user->toArray();
                })
                ->form($this->getFormInputs()),
            DeleteAction::make(),
        ];
    }
}
