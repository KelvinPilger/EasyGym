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
        Schema::create('exercise_session', function (Blueprint $table) {
            $table->id();
            $table->foreignId('workout_session_id')
            ->constrained('workout_session');
            $table->foreignId('workout_exercise_id')
            ->constrained('workout_exercise');
            $table->smallInteger('picked_weight');
            $table->smallInteger('series_made');
            $table->smallInteger('repetitions_total');
            $table->string('interval_made', 10);
            $table->char('rpe', 2)->nullable();
            $table->char('pain_level', 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exercise_session');
    }
};
