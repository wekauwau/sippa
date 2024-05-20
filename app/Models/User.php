<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'phone',
        'username',
        'password',
        'gender',
        'active',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

    protected static function booted(): void
    {
        static::deleting(
            function (User $user) {
                $student = $user->student;

                $student->absents()->delete();
                $student->payments()->delete();
                $student->sicks()->delete();
                $student->violations()->delete();
                $user->teacher->madins()
                    ->update(['teacher_id' => null]);
                $user->teacher()->delete();
                $student->manager()->delete();
                $student->student_data()->delete();
                $user->grade_leader()
                    ->update(['leader_user_id' => null]);
                $user->student()->delete();
            }
        );
    }

    public function student(): HasOne
    {
        return $this->hasOne(Student::class);
    }

    public function grade_leader(): HasOne
    {
        return $this->hasOne(Grade::class);
    }

    public function teacher(): HasOne
    {
        return $this->hasOne(Teacher::class);
    }
}
