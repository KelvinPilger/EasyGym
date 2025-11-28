<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('workout_exercise', function (Blueprint $table) {
            $table->id();
            $table->foreignId('workout_id')
            ->constrained('workout');
            $table->foreignId('exercise_id')
            ->constrained('exercise');
            $table->string('section_label', 100);
            $table->smallInteger('repetitions');
            $table->smallInteger('series');
            $table->string('interval', 10);
            $table->text('observation')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('workout_exercise');
    }
};
