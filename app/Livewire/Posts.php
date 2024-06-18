<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class Posts extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.posts', [
            'posts' => Post::latest()->paginate(5),
        ]);
    }
}
