<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class Blog extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.blog', [
            'posts' => Post::paginate(5),
        ]);
    }
}
