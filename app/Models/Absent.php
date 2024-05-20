<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Absent extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'when',
        'madin_id',
        'status',
        'info',
    ];

    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class);
    }

    public function madin(): BelongsTo
    {
        return $this->belongsTo(Madin::class);
    }
}
