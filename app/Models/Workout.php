<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Workout extends Model
{
    protected $table = 'workout';

    protected $fillable = [
        'id',
        'workout_desc',
        'expiration_date',
        'maximum_sections',
        'user_id',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function workoutExercise() {
        $this->hasMany(WorkoutExercise::class, 'workout_id');
    }

    public function user() {
        $this->belongsTo(User::class, 'user_id');
    }

    public function workoutSession() {
        $this->hasMany(WorkoutSession::class, 'workout_id');
    }
}
