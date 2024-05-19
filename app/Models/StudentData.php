<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StudentData extends Model
{
    use HasFactory;

    protected $primaryKey = 'student_user_id';

    protected $fillable = [
        'student_user_id',
        'birth_date',
        'address',
        'father_name',
        'father_phone_number',
        'mother_name',
        'mother_phone_number',
    ];

    protected static function booted(): void
    {
        static::deleted(
            function (StudentData $attributes) {
                $id = $attributes->student_user_id;

                Manager::destroy($id);
                Sick::where('student_user_id', $id)
                    ->delete();
                Violation::where('student_user_id', $id)
                    ->delete();
                Student::destroy($id);
                Madin::where('teacher_user_id', $id)
                    ->delete();
                Teacher::destroy($id);
                Absent::where('student_user_id', $id)
                    ->delete();
                Grade::where('leader_user_id', $id)
                    ->update(['leader_user_id' => null]);
                Payment::where('student_user_id', $id)
                    ->delete();

                User::destroy($id);
            }
        );
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'student_user_id');
    }
}
