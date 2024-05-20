<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StudentData extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'birth_date',
        'address',
        'father_name',
        'father_phone_number',
        'mother_name',
        'mother_phone_number',
    ];

    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class);
    }
}
