<?php

namespace App\View\Components;

use App\Models\Post;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\Component;

class PostsSection extends Component
{
    public Post $latest_post;
    public Collection $posts;

    public function __construct()
    {
        $records = Post::latest()
            ->take(4)
            ->get();

        $this->latest_post = $records->shift();
        $this->posts = $records;
    }

    public function render(): View|Closure|string
    {
        return view('components.posts-section');
    }
}
