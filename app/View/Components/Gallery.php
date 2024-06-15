<?php

namespace App\View\Components;

use App\Models\Image;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\Component;

class Gallery extends Component
{
    public Collection $images;

    public function __construct()
    {
        $this->images = Image::latest()->take(9)->get();
    }

    public function render(): View|Closure|string
    {
        return view('components.gallery');
    }
}
