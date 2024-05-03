<?php

namespace App\View\Components\Cards;

use App\Models\Division;
use App\Models\Grade;
use App\Models\Manager;
use App\Models\Student;
use App\Models\StudentData;
use App\Models\Teacher;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class Profile extends Component
{
    public object $user;
    private ?object $student;
    private ?object $student_data;

    public string $pfpUrl;
    public string $name;
    public string $roles;
    public string $madin;
    public string $phone;
    public string $address;

    private function getRoles(): void
    {
        $teacher = Teacher::my_find($this->user->id) ? 'ustaz' : null;
        $this->student = Student::my_find($this->user->id);
        $student = $this->student ? 'santri' : null;
        $manager = null;

        if ($student) {
            $manager = Manager::my_find($this->user->id);

            if ($manager) {
                $division = Division::find($manager->division_id);
                $manager = "pengurus ({$division->name})";
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
        $grade = Grade::find($this->student->grade_id);
        $this->madin = $grade->name;

        if ($grade->leader_user_id == $this->user->id)
            $this->madin .= " (ketua)";
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
        if ($this->student) {
            $this->getMadin();
            $this->student_data = StudentData::my_find($this->user->id);
            $this->address = $this->student_data->address;
            $this->phone = $this->user->phone;
        }
    }

    public function render(): View|Closure|string
    {
        return view('components.cards.profile');
    }
}
