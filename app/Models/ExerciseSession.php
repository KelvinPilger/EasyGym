<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExerciseSession extends Model
{
    protected $table = 'exercise_session';

    protected $fillable = [
        'id',
        'workout_session_id',
        'workout_exercise_id',
        'picked_weight',
        'series_made',
        'repetitions_total',
        'interval_made',
        'rpe',
        'pain_level',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function workoutExercise() {
        return $this->belongsTo(WorkoutExercise::class, 'workout_exercise_id');
    }

    public function workoutSession() {
        return $this->belongsTo(WorkoutSession::class, 'workout_session_id');
    }
}
