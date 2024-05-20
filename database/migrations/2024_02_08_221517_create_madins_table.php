<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('madins', function (Blueprint $table) {
            $table->id();
            $table->foreignId('semester_id')->constrained();
            /* malam jumat libur */
            $table->enum('day', [
                'Ahad', 'Senin', 'Selasa',
                'Rabu', 'Jumat', 'Sabtu',
            ]);
            $table->foreignId('grade_id')->constrained();
            $table->foreignId('madin_room_id')->constrained();
            $table->foreignId('lesson_id')->constrained();
            $table->foreignId('teacher_id')
                ->nullable()
                ->constrained();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('madins');
    }
};
