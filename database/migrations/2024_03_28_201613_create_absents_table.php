<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('absents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained();
            $table->date('when');
            $table->foreignId('madin_id')->constrained();
            $table->char('status', 1);
            $table->string('info')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('absents');
    }
};
