<?php

namespace App\Models;

use App\Traits\HasMyFind;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StudentData extends Model
{
    use HasFactory;
    use HasMyFind;

    protected $primaryKey = 'user_id';

    protected $fillable = [
        'user_id',
        'birth_date',
        'address',
        'father_name',
        'father_phone_number',
        'mother_name',
        'mother_phone_number',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
