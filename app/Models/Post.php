<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'image',
        'title',
        'content',
    ];

    protected $appends = ['published_at'];

    public function getPublishedAtAttribute()
    {
        return Carbon::parse($this->created_at)
            ->translatedFormat('d F Y');
    }
}
