<?php

namespace App\Livewire;

use App\Models\Post;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Attributes\Url;
use Livewire\Component;

class BlogPost extends Component
{
    #[Url(history: true)]
    public int $id;

    public function prev()
    {
        $this->id -= 1;
    }

    public function next()
    {
        $this->id += 1;
    }

    private function getPrev(
        Collection $posts_id_title,
        int $id_index
    ): array {
        // Is first?
        $prev = [
            'first' => $this->id == $posts_id_title->first()->id
        ];
        $prev['post'] = $prev['first'] ?
            null
            : $posts_id_title[$id_index - 1];
        $prev['route'] = $prev['post'] ?
            route('post', ['id' => $prev['post']->id])
            : '#';
        $prev['class'] = $prev['first'] ? 'invisible' : '';

        return $prev;
    }

    private function getNext(
        Collection $posts_id_title,
        int $id_index
    ): array {
        // Is last?
        $next = [
            'last' => $this->id == $posts_id_title->last()->id
        ];
        $next['post'] = $next['last'] ?
            null
            : $posts_id_title[$id_index + 1];
        $next['route'] = $next['post'] ?
            route('post', ['id' => $next['post']->id])
            : '#';
        $next['class'] = $next['last'] ? 'invisible' : '';

        return $next;
    }

    public function render()
    {
        $posts_id_title = Post::oldest()->get(['id', 'title']);
        $id_index = $posts_id_title->search(
            fn (Post $item) => $item->id == $this->id
        );

        return view('livewire.blog-post', [
            'post' => Post::find($this->id),
            'prev' => $this->getPrev($posts_id_title, $id_index),
            'next' => $this->getNext($posts_id_title, $id_index),
        ]);
    }
}
