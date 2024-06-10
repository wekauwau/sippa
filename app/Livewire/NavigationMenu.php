<?php

namespace App\Livewire;

use App\Models\Student;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class NavigationMenu extends Component
{
    public bool $student = false;
    public ?string $division_name = null;

    private function getDivisionName(Student $student): void
    {
        $this->division_name = $student?->manager?->division?->name;
    }

    public function __construct()
    {
        $student = Auth::user()?->student;

        if ($student) {
            $this->student = true;
            $this->getDivisionName($student);
        }
    }

    // Copied from:
    // vendor/laravel/jetstream/src/Http/Livewire/NavigationMenu.php
    protected $listeners = [
        'refresh-navigation-menu' => '$refresh',
    ];

    public function render()
    {
        return view('livewire.navigation-menu');
    }
}
