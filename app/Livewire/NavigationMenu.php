<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class NavigationMenu extends Component
{
    public ?string $division_name;

    private function getDivisionName(): void
    {
        if (Auth::check()) {
            if (Auth::user()->manager) {
                $this->division_name = Auth::user()->manager->division->name;
                return;
            }
        }

        $this->division_name = null;
    }

    public function __construct()
    {
        $this->getDivisionName();
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
