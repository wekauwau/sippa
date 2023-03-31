<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('division_members', function (Blueprint $table) {
            $table->id();
            $table->foreignId('divisions_id')->constrained();
            $table->foreignId('users_id')->constrained();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('division_members');
    }
};
