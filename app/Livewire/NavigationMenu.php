<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class NavigationMenu extends Component
{
    public ?string $division_name = null;

    private function getDivisionName(): void
    {
        if (Auth::check()) {
            $this->division_name = Auth::user()->student?->manager?->division?->name;
        }
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
