<?php

namespace App\Traits\StudentDataTable;

use Filament\Tables\Columns\Layout\Stack;
use Filament\Tables\Columns\TextColumn;

trait Columns
{
    private function getPhoneNumber(): TextColumn
    {
        return TextColumn::make('phone')
            ->label('Nomor')
            ->sortable()
            ->searchable();
    }

    private function getBirthDate(): TextColumn
    {
        return TextColumn::make('student.student_data.birth_date')
            ->label('Tanggal Lahir')
            ->sortable()
            ->searchable();
    }

    private function getFather(): Stack
    {
        return Stack::make([
            TextColumn::make('student.student_data.father_name')
                ->label('Nama Ayah')
                ->sortable()
                ->searchable(),
            TextColumn::make('student.student_data.father_phone_number')
                ->label('Nomor Ayah')
                ->sortable()
                ->searchable(),
        ]);
    }

    private function getMother(): Stack
    {
        return Stack::make([
            TextColumn::make('student.student_data.mother_name')
                ->label('Nama Ibu')
                ->sortable()
                ->searchable(),
            TextColumn::make('student.student_data.mother_phone_number',)
                ->label('Nomor Ibu')
                ->sortable()
                ->searchable(),
        ]);
    }

    private function getStudent(): Stack
    {
        return Stack::make([
            TextColumn::make('name')
                ->label('Nama')
                ->sortable()
                ->searchable(),
            TextColumn::make('username')
                ->label('Username')
                ->sortable()
                ->searchable(),
            $this->getPhoneNumber()
                ->hiddenFrom('xl'),
            $this->getBirthDate()
                ->hiddenFrom('xl'),
        ]);
    }
}
