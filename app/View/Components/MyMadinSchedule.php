<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class MyMadinSchedule extends Component
{
    public ?Collection $madins;

    public function __construct()
    {
        $this->madins = Auth::user()->teacher?->madins;
    }

    public function render(): View|Closure|string
    {
        return view('components.my-madin-schedule');
    }
}
