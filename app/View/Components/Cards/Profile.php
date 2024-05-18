<?php

namespace App\View\Components\Cards;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class Profile extends Component
{
    public object $user;

    public string $pfpUrl;
    public string $name;
    public string $roles;
    public ?string $grade = null;
    public string $phone;
    public ?string $address = null;

    private function getRoles(): void
    {
        $teacher = $this->user->teacher ? 'ustaz' : null;
        $student = $this->user->student ? 'santri' : null;
        $manager = null;

        if ($student) {
            $manager = $this->user->manager;

            if ($manager) {
                $division_name = $manager->division->name;
                $manager = "pengurus ({$division_name})";
            }
        }

        $roles = [$teacher, $student, $manager];
        // remove false values
        $roles = array_diff($roles, [null]);
        // uppercase first letter
        $roles = array_map(
            fn ($v) => ucfirst($v),
            $roles
        );
        $this->roles = implode(', ', $roles);
    }

    private function getMadin(): void
    {
        $grade = $this->user->student->grade;
        $this->grade = $grade->name;

        if ($grade->leader_user_id == $this->user->id)
            $this->grade .= " (ketua)";
    }

    public function __construct()
    {
        $this->user = Auth::user();
        $this->pfpUrl = route(
            'image',
            ['name' => 'impostor.jpeg']
        );
        $this->name = $this->user->name;
        $this->getRoles();
        $this->phone = $this->user->phone;

        if ($this->user->student) {
            $this->getMadin();
            $student_data = $this->user->student_data;
            $this->address = $student_data->address;
        }
    }

    public function render(): View|Closure|string
    {
        return view('components.cards.profile');
    }
}
