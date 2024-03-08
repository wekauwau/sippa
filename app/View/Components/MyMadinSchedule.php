<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\View\Component;

class MyMadinSchedule extends Component
{
    /* TODO: add to LaravelServiceProvider: */
    /* TODO: SemesterIDGetter */
    public int $semester_id = 1;
    public $result;
    public $days = [
        'Ahad', 'Senin', 'Selasa',
        'Rabu', 'Jumat', 'Sabtu',
    ];

    /**
     * Create a new component instance.
     */
    public function __construct(
        public int $userid,
    ) {
        $this->result = DB::table('madins')
            ->where('semester_id', $this->semester_id)
            ->where('teacher_user_id', $userid)
            ->orderBy('day')
            ->get();

        foreach ($this->result as $item) {
            $item->grade = resolve_id('grades', $item->grade_id);
            $item->madin_room = resolve_id('madin_rooms', $item->madin_room_id);
            $item->lesson = resolve_id('lessons', $item->lesson_id);
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.my-madin-schedule');
    }
}
