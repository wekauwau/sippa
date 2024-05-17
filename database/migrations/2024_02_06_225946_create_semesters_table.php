<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('semesters', function (Blueprint $table) {
            $table->id();
            $table->year('start');
            $table->year('end');
            $table->boolean('isEven');
            $table->boolean('active');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('semesters');
    }
};
