<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WorkoutExercise extends Model
{
    protected $table = 'workout_exercise';

    protected $fillable = [
        'id',
        'workout_id',
        'exercise_id',
        'section_label',
        'repetitions',
        'series',
        'interval',
        'observation',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function exercise() {
        $this->belongsTo(Exercise::class, 'exercise_id');
    }

    public function workout() {
        $this->belongsTo(Workout::class, 'workout_id');
    }

    public function exerciseSession() {
        $this->hasMany(ExerciseSession::class, 'workout_exercise_id');
    }
}
