<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('bills', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('info')->nullable();
            $table->date('deadline');
            $table->string('amount')->nullable();
            $table->enum(
                'recipient',
                ["Santri", "Santri non-abdi", "Santri abdi"]
            );
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bills');
    }
};
