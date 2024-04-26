<?php

namespace App\View\Components\Cards;

use App\Models\Division;
use App\Models\Manager;
use App\Models\Student;
use App\Models\Teacher;
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

    private function getRoles(): void
    {
        $teacher = Teacher::my_find($this->user->id) ? 'ustaz' : false;
        $student = Student::my_find($this->user->id) ? 'santri' : false;

        if ($student) {
            $manager = Manager::my_find($this->user->id);

            if ($manager) {
                $division = Division::find($manager->division_id);
                $manager = "pengurus ({$division->name})";
            } else {
                $manager = false;
            }
        }

        $roles = [$teacher, $student, $manager];
        // remove false values
        $roles = array_diff($roles, [false]);
        // uppercase first letter
        $roles = array_map(
            fn ($v) => ucfirst($v),
            $roles
        );
        $this->roles = implode(', ', $roles);
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
    }

    public function render(): View|Closure|string
    {
        return view('components.cards.profile');
    }
}
