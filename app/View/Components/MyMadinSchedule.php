<?php

namespace App\View\Components;

use App\Models\Madin;
use App\Models\Semester;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class MyMadinSchedule extends Component
{
    public $result;

    public function __construct()
    {
        $semester_id = Semester::where('active', 1)
            ->first()
            ->id;
        $this->result = Madin::where('semester_id', $semester_id)
            ->where('teacher_user_id', Auth::id())
            ->orderBy('day')
            ->get();
    }

    public function render(): View|Closure|string
    {
        return view('components.my-madin-schedule');
    }
}
