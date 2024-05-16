<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('student_data', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                ->constrained(
                    table: 'users',
                    indexName: 'student_data_user_id',
                );
            $table->date('birth_date');
            $table->string('address');
            $table->string('father_name');
            $table->string('father_phone_number')
                ->nullable();
            $table->string('mother_name');
            $table->string('mother_phone_number')
                ->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('student_data');
    }
};
