<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WorkoutSession extends Model
{
    protected $table = 'workout_session';

    protected $fillable = [
        'id',
        'workout_id',
        'started_at',
        'finished_at',
    ];

    public function workout() {
        return $this->belongsTo(Workout::class, 'workout_id');
    }

    public function exerciseSession() {
        return $this->hasMany(ExerciseSession::class, 'workout_session_id');
    }
}
