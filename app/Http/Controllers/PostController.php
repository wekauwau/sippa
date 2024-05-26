<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        return view('blog');
    }

    public function show(int $id)
    {
        $posts_id_title = Post::select(['id', 'title'])->get();
        $id_index = $posts_id_title->search(
            fn (Post $item) => $item->id == $id
        );

        // INFO: Using index bcs sometimes row is deleted
        // INFO: ex: $ids = [1, 2, 4, 6, 7]

        // Is first?
        $prev = [
            'first' => $id == $posts_id_title->first()->id
        ];
        $prev['post'] = $prev['first'] ?
            null
            : $posts_id_title[$id_index - 1];
        $prev['route'] = $prev['post'] ?
            route('post', $prev['post']->id)
            : '#';
        $prev['class'] = $prev['first'] ? 'invisible' : '';

        // Is last?
        $next = [
            'last' => $id == $posts_id_title->last()->id
        ];
        $next['post'] = $next['last'] ?
            null
            : $posts_id_title[$id_index + 1];
        $next['route'] = $next['post'] ?
            route('post', $next['post']->id)
            : '#';
        $next['class'] = $next['last'] ? 'invisible' : '';

        return view('blog-post', [
            'post' => Post::find($id),
            'prev' => $prev,
            'next' => $next,
        ]);
    }
}
